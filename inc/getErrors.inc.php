<?php
	if($_SESSION['erroPHP'] != ''){
		echo '<div class="container">
				<div class="row">
					<div class="col-md-12 alert alert-warning text-center">
						<span>'.$_SESSION['erroPHP'].'</span>
					</div>
				</div>
			</div>';
		$_SESSION['erroPHP'] = '';
	}

	if($this->getFlash() != ''){
		$flash = explode('_', $this->getFlash());
		echo '<div class="caption-full alert alert-'.$flash[0].' text-center">
				<span>'.$flash[1].'</span>
			</div>';
		$this->setFlash('');
	}