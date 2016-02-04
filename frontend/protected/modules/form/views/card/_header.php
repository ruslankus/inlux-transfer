<div id="header">
    	<div class="container">
        	<div class="row">
            	<div class="col-xs-6 greeting pull-left">
                	<p>Hello <?php echo $this->userName;?>!</p>
                </div><!-- /greetings -->
                
                <div class="col-xs-6 admin-actions">
                
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        	<?php echo $this->userName; ?> <span class="caret"></span>
                        </button>
                        
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/form/card/logout">Log out</a></li>
                        </ul>
                    </div>
                
                </div><!--/admin-actions -->
            </div><!-- /row -->
        </div><!-- /container -->
	</div><!-- /header -->