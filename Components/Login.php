    <!-- Halaman Login -->
    <div class="tab-pane fade " id="login" role="tabpanel" aria-labelledby="login">
                <div class="card">
                    <div class="card-header">
                        <div class="header-title text-center">
                            <span class="blue">Halaman</span> <span class="red">Login</span> <span class="yellow">Admin</span>
                        </div>
                    </div>
                    <div class="card-body">
                    <form id="login" method="post" action="DashboardAdmin.php">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="username" id="loginUsername" placeholder="Username" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>