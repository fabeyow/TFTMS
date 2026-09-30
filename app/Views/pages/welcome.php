<!-- Welcome Page – Today's Tasks -->
<div class="page-header">
    <h1><i class="fas fa-sun"></i> Tasks for Today</h1>
    <p><?= esc($today) ?></p>
</div>

<!-- Stats -->
<?php
    $totalToday   = count($tasks);
    $pendingToday = count(array_filter($tasks, fn($t) => $t['status'] === 'pending'));
    $doneToday    = $totalToday - $pendingToday;
?>
<div class="stats-row">
    <div class="stat-card">
        <div class="stat-icon purple"><i class="fas fa-clipboard-list"></i></div>
        <div>
            <div class="stat-number"><?= $totalToday ?></div>
            <div class="stat-label">Total Today</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon amber"><i class="fas fa-hourglass-half"></i></div>
        <div>
            <div class="stat-number"><?= $pendingToday ?></div>
            <div class="stat-label">Pending</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon cyan"><i class="fas fa-circle-check"></i></div>
        <div>
            <div class="stat-number"><?= $doneToday ?></div>
            <div class="stat-label">Completed</div>
        </div>
    </div>
</div>

<!-- Task Table -->
<div class="card">
    <?php if (empty($tasks)): ?>
        <div class="empty-state">
            <i class="fas fa-mug-hot"></i>
            <p>No tasks for today — enjoy your free time!</p>
        </div>
    <?php else: ?>
        <table class="task-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Created</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $i => $task): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= esc($task['title']) ?></td>
                    <td>
                        <span class="badge badge-<?= esc($task['status']) ?>">
                            <i class="fas fa-<?= $task['status'] === 'completed' ? 'check' : 'clock' ?>"></i>
                            <?= esc($task['status']) ?>
                        </span>
                    </td>
                    <td><?= date('g:i A', strtotime($task['created_at'])) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
