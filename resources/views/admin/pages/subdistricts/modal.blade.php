Modal Insert-->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mdl-insert-update" aria-hidden="true" id="mdl-insert-update">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="card">
				<div class="card-body">
				<h4 class="card-title"><span id="title-modal">  </span></h4>
					<form class="forms-sample" id="frm-insert" action="" method="">
						@csrf
						<div class="form-group row">
							<label for="name" class="col-sm-3 col-form-label">Name</label>
							<div class="col-sm-9 input-wrapper">
								<input type="text" class="form-control" id="name" name="name" placeholder="District Name">
							</div>
						</div>
						<div class="form-group row">
							<label for="name" class="col-sm-3 col-form-label">District</label>
							<div class="col-sm-9 input-wrapper">
								<select class="district-ajax form-control" id="district" name="district" style="width: 100%; height: auto;">
								</select>
							</div>
						</div>
						<button type="submit" class="btn btn-success btn-white-text" id="add-new-btn">Submit</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					</form>
				</div>
			</div>
    	</div>
	</div>
</div>
<!--Modal Insert