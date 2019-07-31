<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" id="mdl-insert-update">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="card">
				<div class="card-body">
				<h4 class="card-title"><span id="title-modal">  </span></h4>
					<form class="forms-sample" id="frm-insert" action="" method="">
						@csrf
						<div class="form-group row">
							<label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name Roles</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="name" name="name" placeholder="Name Role">
							</div>
						</div>
						<div class="form-group row">
							<label for="exampleInputUsername2" class="col-sm-3 col-form-label">Display Name</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="display_name" name="display_name" placeholder="Display Name Role">
							</div>
						</div>
						<div class="form-group row">
							<label for="exampleInputGuard2" class="col-sm-3 col-form-label">Guard Name</label>
							<div class="col-sm-9">
								<select class="form-control" id="guard_name" name="guard_name">
									<option value="web" >Web</option>
									<option value="api" >Api</option>
								</select>
							</div>
						</div>
						<hr>
						<div class="row form-group">
							<div class="col-sm-12">
								<h3><b> Permission </b></h3>
							</div>
						</div>
						<div class="row form-group" id="permission-wrapper">
							<!-- Permission list -->
						</div>
						<hr>
						<button type="submit" class="btn btn-success btn-white-text" id="add-new-btn">Submit</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>