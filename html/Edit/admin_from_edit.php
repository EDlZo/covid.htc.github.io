<?php
include('sql.php');

// Session guard
if (empty($_SESSION['admin_logged_in'])) {
    header('Location: ../login.html');
    exit;
}

$date = isset($_GET['date']) ? trim($_GET['date']) : '';
$htc  = isset($_GET['htc'])  ? trim($_GET['htc'])  : '';

if (empty($date) || empty($htc)) {
    header('Location: admin_list.php');
    exit;
}

// Fetch existing data
$row = null;
$stmt = mysqli_prepare($con, "SELECT * FROM covid1 WHERE date = ? AND htc = ? LIMIT 1");
mysqli_stmt_bind_param($stmt, 'ss', $date, $htc);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($res);
mysqli_stmt_close($stmt);
mysqli_close($con);

if (!$row) {
    header('Location: admin_list.php?msg=error');
    exit;
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>แก้ไขข้อมูล — Covid HTC Admin</title>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --bg:      #0D0D0F;
      --card:    #161618;
      --border:  rgba(255,255,255,0.08);
      --accent:  #00C96E;
      --accent-d:#00A859;
      --text:    #F0F0F5;
      --muted:   #8A8A9A;
      --danger:  #E85D5D;
      --warn:    #F5A623;
      --info:    #4C9EEB;
    }

    body {
      font-family: 'Noto Sans Thai', sans-serif;
      background: var(--bg); color: var(--text); min-height: 100vh;
    }

    .topbar {
      height: 64px;
      background: rgba(13,13,15,0.9);
      border-bottom: 1px solid var(--border);
      display: flex; align-items: center; padding: 0 32px; gap: 16px;
      position: sticky; top: 0; z-index: 50;
      backdrop-filter: blur(12px);
    }

    .back-btn {
      display: flex; align-items: center; gap: 8px;
      color: var(--muted); text-decoration: none;
      font-size: 14px; font-weight: 500;
      padding: 8px 14px; border-radius: 10px;
      transition: background 0.15s, color 0.15s;
    }

    .back-btn:hover { background: rgba(255,255,255,0.06); color: var(--text); }
    .topbar-title { font-size: 16px; font-weight: 700; }

    .main {
      display: flex; align-items: flex-start; justify-content: center;
      padding: 48px 24px; min-height: calc(100vh - 64px);
    }

    .form-card {
      width: 100%; max-width: 520px;
      background: var(--card);
      border: 1px solid var(--border);
      border-radius: 24px;
      padding: 40px;
      box-shadow: 0 32px 64px rgba(0,0,0,0.4);
    }

    .form-header {
      display: flex; align-items: center; gap: 16px; margin-bottom: 28px;
    }

    .form-icon {
      width: 52px; height: 52px;
      background: rgba(245,166,35,0.15);
      border-radius: 14px;
      display: flex; align-items: center; justify-content: center;
      font-size: 24px; flex-shrink: 0;
    }

    .form-header h1 { font-size: 20px; font-weight: 700; line-height: 1.3; }
    .form-header p  { font-size: 13px; color: var(--muted); }

    .info-banner {
      background: rgba(76,158,235,0.1);
      border: 1px solid rgba(76,158,235,0.25);
      border-radius: 12px;
      padding: 14px 18px;
      margin-bottom: 28px;
      font-size: 13px; color: var(--info);
      display: flex; align-items: flex-start; gap: 8px; line-height: 1.6;
    }

    .divider { height: 1px; background: var(--border); margin-bottom: 24px; }

    .form-group { margin-bottom: 20px; }

    label {
      display: block; font-size: 12px; font-weight: 700;
      color: var(--muted); letter-spacing: 0.05em;
      text-transform: uppercase; margin-bottom: 8px;
    }

    .readonly-val {
      background: rgba(255,255,255,0.03);
      border: 1px solid var(--border);
      border-radius: 12px;
      padding: 13px 16px;
      font-size: 15px; color: var(--muted);
    }

    .stat-inputs { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 12px; }
    .stat-inputs .form-group { margin-bottom: 0; }

    .stat-inputs label {
      display: flex; align-items: center; gap: 6px;
    }

    .dot { width: 8px; height: 8px; border-radius: 50%; flex-shrink: 0; }
    .dot-info   { background: var(--info); }
    .dot-green  { background: var(--accent); }
    .dot-danger { background: var(--danger); }

    input[type=number] {
      width: 100%;
      background: rgba(255,255,255,0.05);
      border: 1px solid var(--border);
      border-radius: 12px;
      padding: 13px 14px;
      font-family: 'Noto Sans Thai', sans-serif;
      font-size: 15px; color: var(--text); text-align: center;
      outline: none;
      transition: border-color 0.2s, background 0.2s, box-shadow 0.2s;
    }

    input[type=number]:focus {
      border-color: var(--warn);
      background: rgba(245,166,35,0.06);
      box-shadow: 0 0 0 3px rgba(245,166,35,0.15);
    }

    .btn-group { display: flex; gap: 10px; margin-top: 8px; }

    .btn {
      flex: 1; padding: 14px; border-radius: 12px;
      font-family: 'Noto Sans Thai', sans-serif;
      font-size: 15px; font-weight: 700;
      cursor: pointer; border: none; text-decoration: none;
      text-align: center; line-height: 1;
      transition: transform 0.15s, box-shadow 0.2s;
    }

    .btn-warn {
      background: linear-gradient(135deg, var(--warn), #e08e00);
      color: #fff;
      box-shadow: 0 4px 16px rgba(245,166,35,0.3);
    }

    .btn-warn:hover { transform: translateY(-1px); box-shadow: 0 8px 24px rgba(245,166,35,0.4); }

    .btn-ghost {
      background: rgba(255,255,255,0.06);
      border: 1px solid var(--border);
      color: var(--muted);
    }

    .btn-ghost:hover { background: rgba(255,255,255,0.1); color: var(--text); }

    @media (max-width: 520px) {
      .form-card { padding: 28px 20px; }
      .stat-inputs { grid-template-columns: 1fr; }
    }
  </style>
</head>
<body>
  <header class="topbar">
    <a href="admin_list.php" class="back-btn">← ย้อนกลับ</a>
    <span class="topbar-title">✏️ แก้ไขข้อมูลผู้ป่วย</span>
  </header>

  <main class="main">
    <div class="form-card">
      <div class="form-header">
        <div class="form-icon">✏️</div>
        <div>
          <h1>แก้ไขข้อมูล</h1>
          <p>แก้ไขจำนวนผู้ป่วย COVID-19</p>
        </div>
      </div>

      <div class="info-banner">
        ℹ️ วันที่และแผนกวิชาไม่สามารถเปลี่ยนแปลงได้ หากต้องการเปลี่ยน กรุณาลบและสร้างรายการใหม่
      </div>

      <form action="admin_form_edit_db.php" method="POST">
        <input type="hidden" name="date" value="<?= htmlspecialchars($row['date']) ?>" />
        <input type="hidden" name="htc"  value="<?= htmlspecialchars($row['htc']) ?>" />

        <div class="form-group">
          <label>วันที่</label>
          <div class="readonly-val">📅 <?= htmlspecialchars($row['date']) ?></div>
        </div>

        <div class="form-group">
          <label>แผนกวิชา</label>
          <div class="readonly-val">🏫 <?= htmlspecialchars($row['htc']) ?></div>
        </div>

        <div class="divider"></div>

        <div class="form-group">
          <label>จำนวนผู้ป่วย</label>
          <div class="stat-inputs">
            <div class="form-group">
              <label><span class="dot dot-info"></span>ติดเชื้อใหม่</label>
              <input type="number" name="infect" min="0" value="<?= (int)$row['infect'] ?>" required />
            </div>
            <div class="form-group">
              <label><span class="dot dot-green"></span>หายแล้ว</label>
              <input type="number" name="recovered" min="0" value="<?= (int)$row['recovered'] ?>" required />
            </div>
            <div class="form-group">
              <label><span class="dot dot-danger"></span>เสียชีวิต</label>
              <input type="number" name="death" min="0" value="<?= (int)$row['death'] ?>" required />
            </div>
          </div>
        </div>

        <div class="btn-group">
          <a href="admin_list.php" class="btn btn-ghost">ยกเลิก</a>
          <button type="submit" class="btn btn-warn">✅ บันทึกการแก้ไข</button>
        </div>
      </form>
    </div>
  </main>
</body>
</html>