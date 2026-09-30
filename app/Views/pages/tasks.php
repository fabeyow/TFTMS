<!-- Task List Page – All Tasks -->
<div class="page-header">
    <h1><i class="fas fa-list-check"></i> All Tasks</h1>
    <p>Complete task history, ordered by date.</p>
</div>

<div class="card">
    <?php if (empty($tasks)): ?>
        <div class="empty-state">
            <i class="fas fa-inbox"></i>
            <p>No tasks found.</p>
        </div>
    <?php else: ?>
        <table class="task-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Date</th>
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
                    <td><?= date('M j, Y', strtotime($task['task_date'])) ?></td>
                    <td><?= date('M j, Y g:i A', strtotime($task['created_at'])) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
