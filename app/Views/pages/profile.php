<!-- Profile Page – Demo User -->
<div class="page-header">
    <h1><i class="fas fa-user-circle"></i> User Profile</h1>
    <p>Demo user account details.</p>
</div>

<?php if (session()->getFlashdata('success')): ?>
    <div style="background: rgba(52, 211, 153, 0.12); border: 1px solid rgba(52, 211, 153, 0.3); color: #34d399; padding: 0.75rem 1.25rem; border-radius: 10px; margin-bottom: 1.5rem; font-size: 0.9rem;">
        <i class="fas fa-check-circle"></i> <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div style="background: rgba(239, 68, 68, 0.12); border: 1px solid rgba(239, 68, 68, 0.3); color: #ef4444; padding: 0.75rem 1.25rem; border-radius: 10px; margin-bottom: 1.5rem; font-size: 0.9rem;">
        <i class="fas fa-exclamation-circle"></i> <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<?php if ($user): ?>
<div class="card">
    <div class="profile-card">
        <div class="profile-avatar-wrapper">
            <?php
                $photoPath = 'uploads/profile_photo.jpg';
                $hasPhoto  = file_exists(FCPATH . $photoPath);
            ?>
            <?php if ($hasPhoto): ?>
                <img src="<?= base_url($photoPath) ?>?v=<?= time() ?>" alt="Profile Photo" class="profile-photo">
            <?php else: ?>
                <div class="profile-avatar">
                    <?= strtoupper(substr($user['full_name'], 0, 1)) ?>
                </div>
            <?php endif; ?>

            <!-- Upload Photo Form -->
            <form action="<?= base_url('profile/upload') ?>" method="post" enctype="multipart/form-data" class="photo-upload-form">
                <label for="profile_photo" class="upload-btn" title="Upload profile photo">
                    <i class="fas fa-camera"></i>
                </label>
                <input type="file" name="profile_photo" id="profile_photo" accept="image/*" style="display:none;"
                       onchange="this.form.submit()">
            </form>
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

<style>
    .profile-avatar-wrapper {
        position: relative;
        flex-shrink: 0;
    }
    .profile-photo {
        width: 110px;
        height: 110px;
        border-radius: 50%;
        object-fit: cover;
        box-shadow: 0 0 40px rgba(139, 92, 246, 0.3);
        border: 3px solid rgba(139, 92, 246, 0.4);
    }
    .photo-upload-form {
        position: absolute;
        bottom: 2px;
        right: 2px;
    }
    .upload-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 34px;
        height: 34px;
        border-radius: 50%;
        background: linear-gradient(135deg, #8b5cf6, #06b6d4);
        color: #fff;
        font-size: 0.85rem;
        cursor: pointer;
        border: 2px solid #0f0f1a;
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .upload-btn:hover {
        transform: scale(1.15);
        box-shadow: 0 0 15px rgba(139, 92, 246, 0.5);
    }
</style>
