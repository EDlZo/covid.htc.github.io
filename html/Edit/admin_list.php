<?php
include('sql.php');

// Session guard
if (empty($_SESSION['admin_logged_in'])) {
    header('Location: ../login.html');
    exit;
}

// Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ../login.html');
    exit;
}

// Flash messages
$flash = '';
if (isset($_GET['msg'])) {
    if ($_GET['msg'] === 'deleted') $flash = ['type' => 'success', 'text' => 'ลบข้อมูลสำเร็จ'];
    if ($_GET['msg'] === 'updated') $flash = ['type' => 'success', 'text' => 'อัปเดตข้อมูลสำเร็จ'];
    if ($_GET['msg'] === 'error')   $flash = ['type' => 'error',   'text' => 'เกิดข้อผิดพลาด กรุณาลองใหม่'];
}

// Filter by date range
$from_date = isset($_GET['from']) ? trim($_GET['from']) : '';
$to_date   = isset($_GET['to'])   ? trim($_GET['to'])   : '';

if ($from_date && $to_date) {
    $stmt = mysqli_prepare($con,
        "SELECT * FROM covid1 WHERE date BETWEEN ? AND ? ORDER BY date DESC, infect DESC"
    );
    mysqli_stmt_bind_param($stmt, 'ss', $from_date, $to_date);
} else {
    $stmt = mysqli_prepare($con, "SELECT * FROM covid1 ORDER BY date DESC, infect DESC LIMIT 100");
}
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$records = [];
while ($row = mysqli_fetch_assoc($result)) $records[] = $row;
mysqli_stmt_close($stmt);

// Summary stats
$total_infect = $total_recovered = $total_death = 0;
foreach ($records as $r) {
    $total_infect    += (int)$r['infect'];
    $total_recovered += (int)$r['recovered'];
    $total_death     += (int)$r['death'];
}

mysqli_close($con);
$admin_name = $_SESSION['admin_name'] ?? 'Admin';
?>
<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard — Covid HTC</title>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --bg:      #0D0D0F;
      --surface: #111114;
      --card:    #161618;
      --card2:   #1C1C1F;
      --border:  rgba(255,255,255,0.07);
      --accent:  #00C96E;
      --accent-d:#00A859;
      --warn:    #F5A623;
      --danger:  #E85D5D;
      --info:    #4C9EEB;
      --text:    #F0F0F5;
      --muted:   #8A8A9A;
      --sidebar: 240px;
    }

    body { font-family: 'Noto Sans Thai', sans-serif; background: var(--bg); color: var(--text); display: flex; min-height: 100vh; }

    /* SIDEBAR */
    .sidebar {
      width: var(--sidebar);
      background: var(--surface);
      border-right: 1px solid var(--border);
      display: flex; flex-direction: column;
      position: fixed; top: 0; left: 0; bottom: 0;
      z-index: 50;
    }

    .sidebar-brand {
      padding: 24px 20px;
      border-bottom: 1px solid var(--border);
      display: flex; align-items: center; gap: 10px;
    }

    .brand-icon {
      width: 36px; height: 36px;
      background: linear-gradient(135deg, var(--accent), var(--accent-d));
      border-radius: 10px;
      display: flex; align-items: center; justify-content: center; font-size: 18px;
    }

    .sidebar-brand-text .name { font-size: 15px; font-weight: 700; }
    .sidebar-brand-text .sub  { font-size: 11px; color: var(--muted); }

    .sidebar-nav { flex: 1; padding: 16px 12px; display: flex; flex-direction: column; gap: 4px; }

    .nav-label {
      font-size: 10px; font-weight: 700; color: var(--muted);
      letter-spacing: 0.08em; text-transform: uppercase;
      padding: 12px 8px 6px;
    }

    .nav-item {
      display: flex; align-items: center; gap: 10px;
      padding: 10px 12px;
      border-radius: 10px;
      font-size: 14px; font-weight: 500; color: var(--muted);
      text-decoration: none;
      transition: background 0.15s, color 0.15s;
    }

    .nav-item:hover   { background: rgba(255,255,255,0.05); color: var(--text); }
    .nav-item.active  { background: rgba(0,201,110,0.12); color: var(--accent); }
    .nav-item .icon   { font-size: 16px; }
    .nav-item.danger  { color: var(--danger); }
    .nav-item.danger:hover { background: rgba(232,93,93,0.1); }

    .sidebar-user {
      padding: 16px 20px;
      border-top: 1px solid var(--border);
      display: flex; align-items: center; gap: 10px;
    }

    .user-avatar {
      width: 36px; height: 36px;
      background: var(--card2);
      border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      font-size: 18px; flex-shrink: 0;
    }

    .user-name   { font-size: 13px; font-weight: 600; }
    .user-role   { font-size: 11px; color: var(--muted); }

    /* MAIN */
    .main-wrapper {
      margin-left: var(--sidebar);
      flex: 1;
      display: flex; flex-direction: column;
    }

    /* TOPBAR */
    .topbar {
      height: 64px;
      border-bottom: 1px solid var(--border);
      padding: 0 32px;
      display: flex; align-items: center; justify-content: space-between;
      background: rgba(13,13,15,0.8);
      backdrop-filter: blur(12px);
      position: sticky; top: 0; z-index: 40;
    }

    .topbar-title { font-size: 17px; font-weight: 700; }

    .btn {
      display: inline-flex; align-items: center; gap: 8px;
      padding: 9px 18px;
      border-radius: 10px;
      font-family: 'Noto Sans Thai', sans-serif;
      font-size: 14px; font-weight: 600;
      cursor: pointer; border: none; text-decoration: none;
      transition: transform 0.15s, box-shadow 0.2s, opacity 0.2s;
    }

    .btn-primary {
      background: linear-gradient(135deg, var(--accent), var(--accent-d));
      color: #fff;
      box-shadow: 0 2px 12px rgba(0,201,110,0.3);
    }

    .btn-primary:hover { transform: translateY(-1px); box-shadow: 0 6px 20px rgba(0,201,110,0.4); }

    /* CONTENT */
    .content { padding: 32px; }

    /* FLASH */
    .flash {
      display: flex; align-items: center; gap: 10px;
      padding: 14px 20px;
      border-radius: 12px;
      margin-bottom: 24px;
      font-size: 14px; font-weight: 500;
    }

    .flash-success { background: rgba(0,201,110,0.12); border: 1px solid rgba(0,201,110,0.3); color: var(--accent); }
    .flash-error   { background: rgba(232,93,93,0.12);  border: 1px solid rgba(232,93,93,0.3);  color: var(--danger); }

    /* SUMMARY STATS */
    .summary-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 16px;
      margin-bottom: 32px;
    }

    .sum-card {
      background: var(--card);
      border: 1px solid var(--border);
      border-radius: 14px;
      padding: 20px 24px;
      display: flex; align-items: center; gap: 16px;
    }

    .sum-icon {
      width: 44px; height: 44px;
      border-radius: 12px;
      display: flex; align-items: center; justify-content: center; font-size: 20px; flex-shrink: 0;
    }

    .sum-card.info .sum-icon   { background: rgba(76,158,235,0.15); }
    .sum-card.green .sum-icon  { background: rgba(0,201,110,0.15); }
    .sum-card.danger .sum-icon { background: rgba(232,93,93,0.15); }

    .sum-label { font-size: 12px; color: var(--muted); font-weight: 500; margin-bottom: 4px; }
    .sum-value { font-size: 28px; font-weight: 800; font-variant-numeric: tabular-nums; }

    .sum-card.info .sum-value   { color: var(--info); }
    .sum-card.green .sum-value  { color: var(--accent); }
    .sum-card.danger .sum-value { color: var(--danger); }

    /* FILTER */
    .filter-bar {
      background: var(--card);
      border: 1px solid var(--border);
      border-radius: 14px;
      padding: 16px 20px;
      display: flex; align-items: center; gap: 12px;
      margin-bottom: 20px; flex-wrap: wrap;
    }

    .filter-bar label { font-size: 13px; color: var(--muted); font-weight: 600; white-space: nowrap; }

    .filter-bar input[type=date] {
      background: var(--card2); border: 1px solid var(--border);
      border-radius: 8px; padding: 9px 12px;
      font-family: 'Noto Sans Thai', sans-serif;
      font-size: 13px; color: var(--text);
      outline: none;
    }

    .filter-bar input:focus { border-color: var(--accent); }

    .btn-filter {
      background: var(--card2); border: 1px solid var(--border);
      border-radius: 8px; padding: 9px 16px;
      font-family: 'Noto Sans Thai', sans-serif;
      font-size: 13px; font-weight: 600; color: var(--text);
      cursor: pointer; text-decoration: none;
    }

    /* TABLE */
    .table-wrap {
      background: var(--card);
      border: 1px solid var(--border);
      border-radius: 14px;
      overflow: hidden;
    }

    table { width: 100%; border-collapse: collapse; }

    th {
      background: var(--card2);
      padding: 13px 20px;
      text-align: left;
      font-size: 11px; font-weight: 700;
      color: var(--muted); letter-spacing: 0.06em; text-transform: uppercase;
    }

    td {
      padding: 13px 20px;
      font-size: 14px; color: var(--text);
      border-top: 1px solid rgba(255,255,255,0.04);
    }

    tr:hover td { background: rgba(255,255,255,0.025); }

    .badge {
      display: inline-block;
      padding: 3px 9px; border-radius: 6px;
      font-size: 12px; font-weight: 700;
    }

    .badge-info   { background: rgba(76,158,235,0.15); color: var(--info); }
    .badge-green  { background: rgba(0,201,110,0.15);  color: var(--accent); }
    .badge-danger { background: rgba(232,93,93,0.15);  color: var(--danger); }

    .action-btn {
      display: inline-flex; align-items: center; gap: 5px;
      padding: 6px 12px; border-radius: 7px;
      font-size: 12px; font-weight: 600;
      text-decoration: none; cursor: pointer;
      border: none; font-family: 'Noto Sans Thai', sans-serif;
      transition: opacity 0.15s;
    }

    .action-btn:hover { opacity: 0.8; }
    .btn-edit   { background: rgba(245,166,35,0.15); color: var(--warn); }
    .btn-delete { background: rgba(232,93,93,0.15);  color: var(--danger); }

    .empty-state {
      padding: 60px 20px; text-align: center; color: var(--muted);
    }

    .empty-state .icon { font-size: 48px; margin-bottom: 12px; }
  </style>
</head>
<body>

  <!-- SIDEBAR -->
  <aside class="sidebar">
    <div class="sidebar-brand">
      <div class="brand-icon">🦠</div>
      <div class="sidebar-brand-text">
        <div class="name">Covid HTC</div>
        <div class="sub">Admin Panel</div>
      </div>
    </div>
    <nav class="sidebar-nav">
      <div class="nav-label">จัดการข้อมูล</div>
      <a href="admin_list.php" class="nav-item active">
        <span class="icon">📊</span> ข้อมูลทั้งหมด
      </a>
      <a href="../From.html" class="nav-item">
        <span class="icon">➕</span> บันทึกข้อมูลใหม่
      </a>
      <div class="nav-label" style="margin-top:8px;">ระบบ</div>
      <a href="../index.php" class="nav-item">
        <span class="icon">🌐</span> หน้าสาธารณะ
      </a>
      <a href="?logout=1" class="nav-item danger" onclick="return confirm('ต้องการออกจากระบบ?')">
        <span class="icon">🚪</span> ออกจากระบบ
      </a>
    </nav>
    <div class="sidebar-user">
      <div class="user-avatar">👤</div>
      <div>
        <div class="user-name"><?= htmlspecialchars($admin_name) ?></div>
        <div class="user-role">ผู้ดูแลระบบ</div>
      </div>
    </div>
  </aside>

  <!-- MAIN -->
  <div class="main-wrapper">
    <header class="topbar">
      <div class="topbar-title">📋 จัดการข้อมูลผู้ป่วย COVID-19</div>
      <a href="../From.html" class="btn btn-primary">➕ บันทึกข้อมูลใหม่</a>
    </header>

    <div class="content">
      <!-- Flash Message -->
      <?php if ($flash): ?>
      <div class="flash flash-<?= $flash['type'] ?>">
        <?= $flash['type'] === 'success' ? '✅' : '⚠️' ?>
        <?= htmlspecialchars($flash['text']) ?>
      </div>
      <?php endif; ?>

      <!-- Summary Stats -->
      <div class="summary-grid">
        <div class="sum-card info">
          <div class="sum-icon">🧬</div>
          <div>
            <div class="sum-label">ติดเชื้อรวม (ช่วงที่เลือก)</div>
            <div class="sum-value"><?= number_format($total_infect) ?></div>
          </div>
        </div>
        <div class="sum-card green">
          <div class="sum-icon">💚</div>
          <div>
            <div class="sum-label">หายแล้วรวม</div>
            <div class="sum-value"><?= number_format($total_recovered) ?></div>
          </div>
        </div>
        <div class="sum-card danger">
          <div class="sum-icon">🕊️</div>
          <div>
            <div class="sum-label">เสียชีวิตรวม</div>
            <div class="sum-value"><?= number_format($total_death) ?></div>
          </div>
        </div>
      </div>

      <!-- Filter -->
      <form method="GET" class="filter-bar">
        <label>ช่วงวันที่:</label>
        <input type="date" name="from" value="<?= htmlspecialchars($from_date) ?>" />
        <span style="color:var(--muted);font-size:13px;">ถึง</span>
        <input type="date" name="to" value="<?= htmlspecialchars($to_date) ?>" />
        <button type="submit" class="btn-filter">🔍 กรอง</button>
        <a href="admin_list.php" class="btn-filter">✕ ล้าง</a>
      </form>

      <!-- TABLE -->
      <div class="table-wrap">
        <?php if (empty($records)): ?>
        <div class="empty-state">
          <div class="icon">📋</div>
          <p>ไม่พบข้อมูลในช่วงที่เลือก</p>
        </div>
        <?php else: ?>
        <table>
          <thead>
            <tr>
              <th>วันที่</th>
              <th>แผนกวิชา</th>
              <th>ติดเชื้อใหม่</th>
              <th>หายแล้ว</th>
              <th>เสียชีวิต</th>
              <th>จัดการ</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($records as $row): ?>
            <tr>
              <td><?= htmlspecialchars($row['date']) ?></td>
              <td><?= htmlspecialchars($row['htc']) ?></td>
              <td><span class="badge badge-info"><?= (int)$row['infect'] ?></span></td>
              <td><span class="badge badge-green"><?= (int)$row['recovered'] ?></span></td>
              <td><span class="badge badge-danger"><?= (int)$row['death'] ?></span></td>
              <td style="display:flex;gap:8px;align-items:center;">
                <a href="admin_from_edit.php?act=edit&date=<?= urlencode($row['date']) ?>&htc=<?= urlencode($row['htc']) ?>"
                   class="action-btn btn-edit">✏️ แก้ไข</a>
                <a href="admin_from_del_db.php?date=<?= urlencode($row['date']) ?>&htc=<?= urlencode($row['htc']) ?>"
                   class="action-btn btn-delete"
                   onclick="return confirm('ต้องการลบข้อมูลของ <?= htmlspecialchars(addslashes($row['htc'])) ?> วันที่ <?= htmlspecialchars($row['date']) ?>?')">
                   🗑️ ลบ
                </a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <?php endif; ?>
      </div>
    </div>
  </div>

</body>
</html>