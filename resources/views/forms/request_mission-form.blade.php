<div class="modal fade dialog-modal" data-bs-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title m-auto text-uppercase">Leave Information</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form method="post" id="data-form" enctype="multipart/form-data">
                <input type="hidden" id="id" name="id">
                <input type="hidden" id="is_leave" value="0" name="is_leave">

                @csrf
                <div class="modal-body">
                    <section>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="fw-normal" for="user_id">Your name</label>
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <input type="text" disabled value="{{ Auth::user()->name }}"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="fw-normal" for="leave_id">Mission</label>
                                    <select name="leave_id" class="form-select leave_id">
                                        <option value="-1" class="text-danger">---Select the mission---</option>
                                        @foreach ($leaves as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }} ({{ $item->duration }})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="fw-normal" for="started">From-Date</label>
                                    <input type="date" name="started" class="form-control started">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="fw-normal" for="ended">To-Date</label>
                                    <input type="date" name="ended" class="form-control ended">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label class="fw-normal" for="noted">Reason</label>
                                    <textarea name="noted" type="text" class="form-control noted" placeholder="Input the reason"></textarea>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="modal-footer">
                    <section>
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">
                            <i class=" fas fa-times-circle"></i>
                            <span class="text-uppercase">Close</span>
                        </button>
                        <button type="button" class="btn btn-success update">
                            <i class=" fas fas fa-redo-alt"></i>
                            <span class="text-uppercase">Update</span>
                        </button>
                        <button type="button" class="btn btn-info save">
                            <i class=" fas fa-save"></i>
                            <span class="text-uppercase">Save</span>
                        </button>
                    </section>
                </div>

            </form>
        </div>

        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
