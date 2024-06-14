<?php
/** @var array $user */
/** @var array $projects */
?>

<style>
        body {
            background-color: #f8f9fa;
        }
        .profile-header {
            background: #007bff;
            color: white;
            padding: 20px 0;
        }
        .profile-header h1 {
            margin: 0;
            font-size: 2rem;
        }
        .profile-info {
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }
        .projects-list {
            margin-top: 20px;
        }
        .project-card {
            margin-bottom: 20px;
        }
    </style>

<main class="container mt-4">
        <div class="profile-info p-4 mb-4">
            <h2 class="mb-3">User Information</h2>
            <p><strong>Username:</strong> <?= htmlspecialchars($user['Username']) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($user['Email']) ?></p>
        </div>

        <div class="projects-list">
            <h2 class="mb-3">Projects</h2>
            <?php if (!empty($projects)): ?>
                <div class="row">
                    <?php foreach ($projects as $project): ?>
                        <div class="col-md-4 project-card">
                            <div class="card h-100">
                                <div class="card-body">
                                    <a href="/project/view/<?= htmlspecialchars($project['ProjectID']) ?>">
                                        <h5 class="card-title"><?= htmlspecialchars($project['ProjectName']) ?></h5>
                                        <p class="card-text">
                                            <strong>Service:</strong> <?= htmlspecialchars($project['ServiceName']) ?><br>
                                            <strong>Status:</strong> <?= htmlspecialchars($project['Status']) ?><br>
                                            <strong>Budget:</strong> $<?= htmlspecialchars($project['Budget']) ?><br>
                                            <strong>Start Date:</strong> <?= htmlspecialchars($project['StartDate']) ?><br>
                                            <strong>End Date:</strong> <?= htmlspecialchars($project['EndDate']) ?>
                                        </p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p class="text-muted">No projects found.</p>
            <?php endif; ?>
        </div>
        
        <div class="d-flex justify-content-between mt-4">
            <a href="/user/update" class="btn btn-primary">Edit Profile</a>
            <a href="/user/logout" class="btn btn-danger">Logout</a>
        </div>
    </main>
