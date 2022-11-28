
{{--
                         --}}
{{--Update Modal FINSH--}}{{--


<div  class="modal fade" id="AddBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{route('brand.store')}}">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label>Name</label>
                        <input type="text" name="name" placeholder="Name" class="form-control" value="{{old('name')}}" required>
                        @error('name') <smal class="text-danger">{{$message}}</smal> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Status</label><br>
                        <input type="checkbox" name="status" >
                        @error('status') <smal class="text-danger">{{$message}}</smal> @enderror
                    </div>


                </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

                         <!--Create Modal FONSH-->

                         --}}
{{----------------------------------------------------------------------------------------------------------------------------------------}}{{--
--}}
{{--



                         --}}
{{-- Update Modal start--}}{{--

<div  class="modal fade" id="UpdateBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST"
                 --}}
{{-- action="{{route('brand.edit')}}"--}}{{--

            >
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label>Name</label>
                        <input type="text" name="name" placeholder="Name" class="form-control" value="{{old('name')}}" required>
                        @error('name') <smal class="text-danger">{{$message}}</smal> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Status</label><br>
                        <input type="checkbox" name="status" >
                        @error('status') <smal class="text-danger">{{$message}}</smal> @enderror
                    </div>


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
--}}


                        <!--Create Modal START-->

                        <div wire:ignore.self class="modal fade" id="AddBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Modal </h5>
                                        <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form wire:submit.prevent="storeBrand">
                                        <div class="modal-body">
                                            <div class="form-group mb-3">
                                                <label>Name</label>
                                                <input type="text" wire:model.defer="name"  placeholder="Name" class="form-control" value="{{old('name')}}">
                                                @error('name') <smal class="text-danger">{{$message}}</smal> @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="">Status</label><br>
                                                <input type="checkbox" wire:model.defer="status" >
                                                @error('status') <smal class="text-danger">{{$message}}</smal> @enderror
                                            </div>


                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--Create Modal FiNSH-->

{{----------------------------------------------------------------------------------------------------------------------------------------}}



{{-- Update Modal start--}}

                        <div wire:ignore.self class="modal fade" id="UpdateBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Update Brands</h5>
                                        <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form wire:submit.prevent="editBrand">
                                        <div class="modal-body">
                                            <div class="form-group mb-3">
                                                <label>Name</label>
                                                <input type="text" wire:model.defer="name"  placeholder="Name" class="form-control" value="{{old('name')}}">
                                                @error('name') <smal class="text-danger">{{$message}}</smal> @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="">Status</label><br>
                                                <input type="checkbox" wire:model.defer="status" >
                                                @error('status') <smal class="text-danger">{{$message}}</smal> @enderror
                                            </div>


                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
