<?php
// =========================================
// Main Public Dashboard — Covid HTC
// =========================================
$connect = mysqli_connect('localhost', 'root', '', 'covid');
if ($connect) {
    mysqli_set_charset($connect, 'utf8mb4');
}
$today = date('Y-m-d');

// ยอดวันนี้แยกตามแผนก
$departments = [];
if ($connect) {
    $stmt = mysqli_prepare($connect, "SELECT htc, infect, recovered, death FROM covid1 WHERE date = ? ORDER BY infect DESC");
    mysqli_stmt_bind_param($stmt, 's', $today);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($res)) $departments[] = $row;
    mysqli_stmt_close($stmt);
}

// ข้อมูลกราฟ (30 วันล่าสุด)
$chart_labels = $chart_infect = $chart_recovered = $chart_death = [];
if ($connect) {
    $stmt2 = mysqli_prepare($connect,
        "SELECT date, SUM(infect) AS infect, SUM(recovered) AS recovered, SUM(death) AS death
         FROM covid1 GROUP BY date ORDER BY date ASC LIMIT 30"
    );
    mysqli_stmt_execute($stmt2);
    $res2 = mysqli_stmt_get_result($stmt2);
    while ($row = mysqli_fetch_assoc($res2)) {
        $chart_labels[]    = $row['date'];
        $chart_infect[]    = (int)$row['infect'];
        $chart_recovered[] = (int)$row['recovered'];
        $chart_death[]     = (int)$row['death'];
    }
    mysqli_stmt_close($stmt2);
}

if ($connect) mysqli_close($connect);
?>
<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Covid HTC — สถานการณ์ COVID-19 วิทยาลัยเทคนิคหาดใหญ่</title>
  <meta name="description" content="ติดตามสถานการณ์ COVID-19 ภายในวิทยาลัยเทคนิคหาดใหญ่ แบบ real-time" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --bg:       #0D0D0F;
      --surface:  #111114;
      --card:     #161618;
      --card2:    #1C1C1F;
      --border:   rgba(255,255,255,0.07);
      --accent:   #00C96E;
      --accent-d: #00A859;
      --warn:     #F5A623;
      --danger:   #E85D5D;
      --info:     #4C9EEB;
      --text:     #F0F0F5;
      --muted:    #8A8A9A;
      --radius:   16px;
    }

    html { scroll-behavior: smooth; }

    body {
      font-family: 'Noto Sans Thai', sans-serif;
      background: var(--bg);
      color: var(--text);
      min-height: 100vh;
    }

    /* ── TOPBAR ── */
    .topbar {
      position: sticky; top: 0; z-index: 100;
      background: rgba(13,13,15,0.85);
      backdrop-filter: blur(16px);
      border-bottom: 1px solid var(--border);
      padding: 0 32px;
      height: 64px;
      display: flex; align-items: center; justify-content: space-between;
    }

    .topbar-brand {
      display: flex; align-items: center; gap: 12px;
    }

    .brand-icon {
      width: 36px; height: 36px;
      background: linear-gradient(135deg, var(--accent), var(--accent-d));
      border-radius: 10px;
      display: flex; align-items: center; justify-content: center;
      font-size: 18px;
    }

    .brand-name {
      font-size: 17px; font-weight: 700; color: var(--text);
    }

    .brand-sub {
      font-size: 12px; color: var(--muted); font-weight: 400;
    }

    .topbar-nav {
      display: flex; align-items: center; gap: 8px;
    }

    .topbar-nav a {
      padding: 8px 16px;
      border-radius: 10px;
      font-size: 14px; font-weight: 500;
      color: var(--muted); text-decoration: none;
      transition: background 0.15s, color 0.15s;
    }

    .topbar-nav a:hover { background: rgba(255,255,255,0.06); color: var(--text); }
    .topbar-nav a.active { background: rgba(0,201,110,0.12); color: var(--accent); }

    .topbar-admin {
      background: var(--accent);
      color: #fff !important;
      padding: 8px 18px !important;
      border-radius: 10px !important;
      font-weight: 600 !important;
      transition: background 0.15s !important;
    }
    .topbar-admin:hover { background: var(--accent-d) !important; color: #fff !important; }

    /* ── HERO ── */
    .hero {
      padding: 64px 32px 48px;
      text-align: center;
      position: relative;
      overflow: hidden;
    }

    .hero::before {
      content: '';
      position: absolute; inset: 0;
      background:
        radial-gradient(ellipse 800px 400px at 50% 0%, rgba(0,201,110,0.08) 0%, transparent 60%);
      pointer-events: none;
    }

    .hero-badge {
      display: inline-flex; align-items: center; gap: 6px;
      background: rgba(0,201,110,0.1);
      border: 1px solid rgba(0,201,110,0.25);
      border-radius: 999px;
      padding: 6px 14px;
      font-size: 13px; color: var(--accent); font-weight: 600;
      margin-bottom: 20px;
    }

    .hero-badge .dot {
      width: 7px; height: 7px;
      background: var(--accent);
      border-radius: 50%;
      animation: pulse 1.6s ease-in-out infinite;
    }

    @keyframes pulse {
      0%, 100% { opacity: 1; transform: scale(1); }
      50% { opacity: 0.4; transform: scale(0.8); }
    }

    .hero h1 {
      font-size: clamp(28px, 5vw, 48px);
      font-weight: 800;
      color: var(--text);
      line-height: 1.2;
      margin-bottom: 12px;
    }

    .hero h1 span { color: var(--accent); }

    .hero-date {
      font-size: 15px; color: var(--muted);
      margin-bottom: 48px;
    }

    /* ── STAT CARDS ── */
    .stats-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 16px;
      max-width: 960px;
      margin: 0 auto;
      padding: 0 32px 48px;
    }

    .stat-card {
      background: var(--card);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      padding: 24px;
      transition: transform 0.2s, box-shadow 0.2s;
      position: relative;
      overflow: hidden;
    }

    .stat-card::after {
      content: '';
      position: absolute; top: 0; left: 0; right: 0;
      height: 3px;
      background: var(--card-accent, var(--accent));
      border-radius: var(--radius) var(--radius) 0 0;
    }

    .stat-card:hover { transform: translateY(-3px); box-shadow: 0 12px 32px rgba(0,0,0,0.3); }

    .stat-card.new   { --card-accent: var(--info); }
    .stat-card.total { --card-accent: var(--warn); }
    .stat-card.rec   { --card-accent: var(--accent); }
    .stat-card.dead  { --card-accent: var(--danger); }

    .stat-icon {
      font-size: 28px; margin-bottom: 12px;
    }

    .stat-label {
      font-size: 13px; color: var(--muted); font-weight: 500;
      margin-bottom: 8px;
    }

    .stat-value {
      font-size: 40px; font-weight: 800;
      color: var(--text); line-height: 1;
      font-variant-numeric: tabular-nums;
    }

    .stat-value.accent { color: var(--accent); }
    .stat-value.warn   { color: var(--warn); }
    .stat-value.info   { color: var(--info); }
    .stat-value.danger { color: var(--danger); }

    /* ── SECTION ── */
    .section {
      max-width: 1100px;
      margin: 0 auto;
      padding: 0 32px 48px;
    }

    .section-title {
      font-size: 20px; font-weight: 700;
      color: var(--text);
      margin-bottom: 4px;
    }

    .section-sub {
      font-size: 14px; color: var(--muted);
      margin-bottom: 24px;
    }

    /* ── CHART ── */
    .chart-card {
      background: var(--card);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      padding: 28px;
    }

    .chart-wrap {
      position: relative;
      height: 340px;
    }

    /* ── DEPT TABLE ── */
    .table-card {
      background: var(--card);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      overflow: hidden;
    }

    table {
      width: 100%; border-collapse: collapse;
    }

    th {
      background: var(--card2);
      font-size: 12px; font-weight: 700;
      color: var(--muted); text-transform: uppercase;
      letter-spacing: 0.06em;
      padding: 14px 20px; text-align: left;
    }

    td {
      padding: 14px 20px;
      font-size: 14px; color: var(--text);
      border-top: 1px solid var(--border);
    }

    tr:hover td { background: rgba(255,255,255,0.025); }

    .badge {
      display: inline-block;
      padding: 4px 10px;
      border-radius: 6px;
      font-size: 13px; font-weight: 700;
    }

    .badge-info   { background: rgba(76,158,235,0.15); color: var(--info); }
    .badge-green  { background: rgba(0,201,110,0.15);  color: var(--accent); }
    .badge-danger { background: rgba(232,93,93,0.15);  color: var(--danger); }

    .empty-state {
      padding: 60px 20px;
      text-align: center;
      color: var(--muted);
    }

    .empty-state .icon { font-size: 48px; margin-bottom: 12px; }
    .empty-state p { font-size: 15px; }

    /* ── FAQ ── */
    .faq-list { display: flex; flex-direction: column; gap: 8px; }

    .faq-item {
      background: var(--card);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      overflow: hidden;
    }

    .faq-toggle {
      width: 100%; background: none; border: none;
      padding: 18px 24px;
      display: flex; align-items: center; justify-content: space-between;
      cursor: pointer; text-align: left;
      font-family: 'Noto Sans Thai', sans-serif;
      font-size: 15px; font-weight: 600; color: var(--text);
      transition: background 0.15s;
    }

    .faq-toggle:hover { background: rgba(255,255,255,0.04); }

    .faq-toggle .chevron {
      transition: transform 0.25s;
      color: var(--muted); font-size: 12px;
      flex-shrink: 0;
    }

    .faq-item.open .chevron { transform: rotate(180deg); }

    .faq-body {
      display: none;
      padding: 0 24px 20px;
      font-size: 14px; color: var(--muted); line-height: 1.8;
    }

    .faq-item.open .faq-body { display: block; }

    /* ── FOOTER ── */
    footer {
      border-top: 1px solid var(--border);
      padding: 32px;
      text-align: center;
      font-size: 13px; color: var(--muted);
    }

    .footer-logo {
      font-size: 24px; margin-bottom: 8px;
    }

    /* ── LOADING SKELETON ── */
    .skel {
      background: linear-gradient(90deg, #1a1a1e 25%, #222226 50%, #1a1a1e 75%);
      background-size: 200% 100%;
      animation: shimmer 1.5s infinite;
      border-radius: 8px;
      display: inline-block;
      min-width: 60px; height: 1em;
    }

    @keyframes shimmer { to { background-position: -200% 0; } }

    @media (max-width: 600px) {
      .topbar { padding: 0 16px; }
      .hero { padding: 40px 16px 32px; }
      .stats-grid, .section { padding-left: 16px; padding-right: 16px; }
    }
  </style>
</head>
<body>

  <!-- TOPBAR -->
  <header class="topbar">
    <div class="topbar-brand">
      <div class="brand-icon">🦠</div>
      <div>
        <div class="brand-name">Covid HTC</div>
        <div class="brand-sub">วิทยาลัยเทคนิคหาดใหญ่</div>
      </div>
    </div>
    <nav class="topbar-nav">
      <a href="#stats" class="active">ภาพรวม</a>
      <a href="#chart">กราฟ</a>
      <a href="#departments">แผนก</a>
      <a href="#faq">FAQ</a>
      <a href="./login.html" class="topbar-admin">🔐 เจ้าหน้าที่</a>
    </nav>
  </header>

  <!-- HERO -->
  <section class="hero">
    <div class="hero-badge">
      <span class="dot"></span>
      อัปเดต Real-time
    </div>
    <h1>สถานการณ์ <span>COVID-19</span><br>วิทยาลัยเทคนิคหาดใหญ่</h1>
    <p class="hero-date" id="current-date">กำลังโหลด...</p>
  </section>

  <!-- STAT CARDS -->
  <div class="stats-grid" id="stats">
    <div class="stat-card new">
      <div class="stat-icon">🧬</div>
      <div class="stat-label">ผู้ติดเชื้อรายใหม่วันนี้</div>
      <div class="stat-value info" id="new_infect"><span class="skel" style="width:70px;height:40px;"></span></div>
    </div>
    <div class="stat-card total">
      <div class="stat-icon">📊</div>
      <div class="stat-label">ผู้ติดเชื้อสะสม</div>
      <div class="stat-value warn" id="total_infect"><span class="skel" style="width:70px;height:40px;"></span></div>
    </div>
    <div class="stat-card rec">
      <div class="stat-icon">💚</div>
      <div class="stat-label">หายแล้ววันนี้</div>
      <div class="stat-value accent" id="recovered"><span class="skel" style="width:70px;height:40px;"></span></div>
    </div>
    <div class="stat-card dead">
      <div class="stat-icon">🕊️</div>
      <div class="stat-label">เสียชีวิตวันนี้</div>
      <div class="stat-value danger" id="death"><span class="skel" style="width:70px;height:40px;"></span></div>
    </div>
  </div>

  <!-- CHART -->
  <div class="section" id="chart">
    <div class="section-title">📈 กราฟแนวโน้มย้อนหลัง</div>
    <div class="section-sub">ข้อมูลสะสมรายวัน 30 วันล่าสุด</div>
    <div class="chart-card">
      <div class="chart-wrap">
        <canvas id="covidChart"></canvas>
      </div>
    </div>
  </div>

  <!-- DEPARTMENT TABLE -->
  <div class="section" id="departments">
    <div class="section-title">🏫 ข้อมูลรายแผนก — ประจำวันนี้</div>
    <div class="section-sub">แสดงจำนวนผู้ป่วยแยกตามแผนกวิชา</div>
    <div class="table-card">
      <?php if (empty($departments)): ?>
        <div class="empty-state">
          <div class="icon">📋</div>
          <p>ยังไม่มีข้อมูลสำหรับวันนี้</p>
        </div>
      <?php else: ?>
      <table>
        <thead>
          <tr>
            <th>แผนกวิชา</th>
            <th>ติดเชื้อใหม่</th>
            <th>หายแล้ว</th>
            <th>เสียชีวิต</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($departments as $d): ?>
          <tr>
            <td><?= htmlspecialchars($d['htc']) ?></td>
            <td><span class="badge badge-info"><?= (int)$d['infect'] ?> ราย</span></td>
            <td><span class="badge badge-green"><?= (int)$d['recovered'] ?> ราย</span></td>
            <td><span class="badge badge-danger"><?= (int)$d['death'] ?> ราย</span></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <?php endif; ?>
    </div>
  </div>

  <!-- FAQ -->
  <div class="section" id="faq">
    <div class="section-title">❓ คำถามที่พบบ่อย (FAQ)</div>
    <div class="section-sub">ข้อมูลความรู้เกี่ยวกับ COVID-19</div>
    <div class="faq-list">
      <?php
      $faqs = [
        ['ฉันรู้ได้อย่างไรว่าติดโควิด-19?', 'หากไปตรวจกับโรงพยาบาลแล้วแจ้งมาว่าพบเชื้อ (Detectable) นั่นแปลว่าติดแล้ว อาการที่พบได้แก่ ไข้ขึ้นสูง ไอแห้ง เหนื่อยล้า สูญเสียการรับรสหรือกลิ่น หรือมีผื่นขึ้น'],
        ['ถ้าติดโควิดต้องจ่ายเงินเองไหม?', 'รัฐบาลยืนยันว่า "รักษาฟรี" สำหรับผู้ที่ตรวจแล้วพบเชื้อและจำเป็นต้องเข้ารับการรักษา'],
        ['โควิด-19 เป็นแล้วเป็นอีกได้ไหม?', 'โดยหลักการทางไวรัสวิทยา การติดเชื้อแล้วควรมีภูมิต้านทาน แต่ยังต้องศึกษาข้อมูลเพิ่มเติมในระยะยาว'],
        ['ถ้าติดเชื้อจะอันตรายแค่ไหน?', 'ผู้ติดเชื้อกว่า 80% มีอาการเพียงเล็กน้อยถึงปานกลาง กลุ่มเสี่ยงสูงคือผู้สูงอายุและผู้ที่มีโรคประจำตัว'],
        ['ป้องกันตัวเองได้อย่างไร?', 'สวมหน้ากากอนามัยเสมอ ล้างมือบ่อยๆ เว้นระยะห่างจากผู้อื่นอย่างน้อย 1-2 เมตร และหลีกเลี่ยงสถานที่แออัด'],
      ];
      foreach ($faqs as $i => $faq):
      ?>
      <div class="faq-item" id="faq<?= $i ?>">
        <button class="faq-toggle" onclick="toggleFaq(<?= $i ?>)">
          <span><?= htmlspecialchars($faq[0]) ?></span>
          <span class="chevron">▼</span>
        </button>
        <div class="faq-body"><?= htmlspecialchars($faq[1]) ?></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- FOOTER -->
  <footer>
    <div class="footer-logo">🦠</div>
    <p>© <?= date('Y') ?> วิทยาลัยเทคนิคหาดใหญ่ — Covid HTC Tracking System</p>
  </footer>

  <script>
    // Date display
    const now = new Date();
    const opts = { weekday:'long', year:'numeric', month:'long', day:'numeric' };
    document.getElementById('current-date').textContent =
      'ข้อมูล ณ วันที่ ' + now.toLocaleDateString('th-TH', opts);

    // Fetch today's stats
    fetch('/Covid19/covid.htc.github.io/CovidAPI/')
      .then(r => r.json())
      .then(data => {
        const fmt = n => (n ?? 0).toLocaleString('th-TH');
        document.getElementById('new_infect').textContent   = fmt(data.infect);
        document.getElementById('total_infect').textContent = fmt(data.total_infect);
        document.getElementById('recovered').textContent    = fmt(data.recovered);
        document.getElementById('death').textContent        = fmt(data.death);
      })
      .catch(() => {
        ['new_infect','total_infect','recovered','death'].forEach(id => {
          document.getElementById(id).textContent = '—';
        });
      });

    // Chart.js
    const chartLabels    = <?= json_encode($chart_labels) ?>;
    const chartInfect    = <?= json_encode($chart_infect) ?>;
    const chartRecovered = <?= json_encode($chart_recovered) ?>;
    const chartDeath     = <?= json_encode($chart_death) ?>;

    if (chartLabels.length > 0) {
      const ctx = document.getElementById('covidChart').getContext('2d');
      new Chart(ctx, {
        type: 'bar',
        data: {
          labels: chartLabels,
          datasets: [
            {
              label: 'ติดเชื้อใหม่',
              data: chartInfect,
              backgroundColor: 'rgba(76,158,235,0.75)',
              borderRadius: 4
            },
            {
              label: 'หายแล้ว',
              data: chartRecovered,
              backgroundColor: 'rgba(0,201,110,0.75)',
              borderRadius: 4
            },
            {
              label: 'เสียชีวิต',
              data: chartDeath,
              backgroundColor: 'rgba(232,93,93,0.75)',
              borderRadius: 4
            }
          ]
        },
        options: {
          responsive: true, maintainAspectRatio: false,
          plugins: {
            legend: { labels: { color: '#8A8A9A', font: { family: "'Noto Sans Thai'" } } }
          },
          scales: {
            x: {
              stacked: true,
              ticks: { color: '#8A8A9A', maxRotation: 60, font: { size: 11 } },
              grid: { color: 'rgba(255,255,255,0.04)' }
            },
            y: {
              stacked: true,
              ticks: { color: '#8A8A9A' },
              grid: { color: 'rgba(255,255,255,0.06)' }
            }
          }
        }
      });
    }

    // FAQ toggle
    function toggleFaq(i) {
      const el = document.getElementById('faq' + i);
      el.classList.toggle('open');
    }
  </script>
</body>
</html>