@if (!empty($all_properties))
    @foreach ($all_properties as $all_property)
        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
            <div
                class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-md-50 mb-5 mb-xl-10 h-lg-100">


                <div class="card-header pt-5">
                    <div class="card-title d-flex flex-column">
                        <label class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2" style="margin-bottom:20px;"
                            for="my_property_{{ $all_property->property_id }}">{{ $all_property->property_name }}</label>

                     

                                <?php 
                                if($all_property->property_id == $selected_property )
                                {
                                    ?>
 <label class="fs-2hx  text-success me-2 lh-1 ls-n2"
 >Selected</label>
                                    <?php 
                                }
                                else{
                                    ?>
                                    <form action="{{route('admin.change_property')}}" method="POST" >
                                        @csrf 
                                        <input type="hidden" name="property_id" value="{{ $all_property->property_id }}" />
                                        <button type="submit" class="btn btn-primary" >Swith this property</button>

                                    </form>
                                    <?php 

                                }
                                ?>
                    </div>
                </div>



            </div>
        </div>
    @endforeach
@endif 

