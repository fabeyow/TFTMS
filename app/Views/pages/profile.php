<!-- Profile Page – Demo User -->
<div class="page-header">
    <h1><i class="fas fa-user-circle"></i> User Profile</h1>
    <p>Demo user account details.</p>
</div>

<?php if ($user): ?>
<div class="card">
    <div class="profile-card">
        <div class="profile-avatar">
            <?= strtoupper(substr($user['full_name'], 0, 1)) ?>
        </div>
        <div class="profile-info">
            <h2><?= esc($user['full_name']) ?></h2>
            <div class="profile-detail">
                <i class="fas fa-at"></i>
                <span><?= esc($user['username']) ?></span>
            </div>
            <div class="profile-detail">
                <i class="fas fa-envelope"></i>
                <span><?= esc($user['email']) ?></span>
            </div>
            <div class="profile-detail">
                <i class="fas fa-calendar-plus"></i>
                <span>Member since <?= date('F j, Y', strtotime($user['created_at'])) ?></span>
            </div>
        </div>
    </div>
</div>
<?php else: ?>
<div class="card">
    <div class="empty-state">
        <i class="fas fa-user-slash"></i>
        <p>No user record found.</p>
    </div>
</div>
<?php endif; ?>
