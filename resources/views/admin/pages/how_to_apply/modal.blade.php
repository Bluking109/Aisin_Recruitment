<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mdl-insert-update" aria-hidden="true" id="mdl-insert-update">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="card">
				<div class="card-body">
				<h4 class="card-title"><span id="title-modal">  </span></h4>
					<form class="forms-sample" id="frm-insert" action="{{ route('admin.how-to-applies.store') }}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group row">
							<label for="name" class="col-sm-3 col-form-label">Title</label>
							<div class="col-sm-9 input-wrapper">
								<input type="text" class="form-control" id="title" name="title" placeholder="Title">
							</div>
						</div>
						<div class="form-group row">
							<label for="name" class="col-sm-3 col-form-label">Sub Title</label>
							<div class="col-sm-9 input-wrapper">
								<input type="text" class="form-control" id="sub-title" name="sub_title" placeholder="Sub Title">
							</div>
						</div>
						<div class="form-group row">
							<label for="name" class="col-sm-3 col-form-label">Image</label>
							<div class="col-sm-9 input-wrapper">
								<input type="file" class="form-control" id="image" name="image">
							</div>
						</div>
						<div class="form-group row">
							<label for="name" class="col-sm-3 col-form-label">Content</label>
							<div class="col-sm-9 input-wrapper">
								<textarea class="summernote" id="content" name="content"> </textarea>
							</div>
						</div>
						<div class="form-group row">
							<label for="name" class="col-sm-3 col-form-label">Status</label>
							<div class="col-sm-9 input-wrapper">
	                          <div class="form-check">
	                            <label class="form-check-label">
	                              <input type="radio" class="form-check-input" name="is_active" id="radioActive" value="1">
	                              Active
	                            </label>
	                          </div>
	                          <div class="form-check">
	                            <label class="form-check-label">
	                              <input type="radio" class="form-check-input" name="is_active" id="radioInactive" value="0" checked>
	                              Inactive
	                            </label>
	                          </div>
							</div>
						</div>
						<button type="submit" class="btn btn-primary btn-white-text" id="add-new-btn">Submit</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					</form>
				</div>
			</div>
    	</div>
	</div>
</div>