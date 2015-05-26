<?php if($error)
{ 
	redirect(base_url());
}?>
<div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message" style="padding-top:5%; padding-bottom:5%;">
                        <h1>CILUKBA INCORPORATED</h1>
                        <h3>Login Page</h3>
                        <hr class="intro-divider">
                        <form class="col-md-12" action="<?=base_url()?>" method="POST">
							<div class="form-group">
								<input type="text" class="form-control input-lg" placeholder="Username" name="username" id="username">
							</div>
							<div class="form-group">
								<input type="password" class="form-control input-lg" placeholder="Password" name="password" id="password">
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-lg btn-block">Log In</button>
							</div>
						</form>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->
	

    </div>