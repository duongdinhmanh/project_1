@extends( 'admin.index' )
@section( 'content' )
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3><i style="padding-right: 20px" class="fa fa-database"></i>{{ trans( 'config.add_new_apartments' ) }}
            </h3>
        </div>
        <div class="title_right">
            <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-language"></i>
                    <span id="current_lang" class="public-icon">
                    </span>{{ trans( 'config.language' ) }}<span class="caret">
                    </span>
                </button>
                <ul id="lang" class="dropdown-menu" style="z-index: 999999">
                    <li>
                        <a href="{!!  route( 'change_lang',[ 'vi' ] )  !!}">
                            <img id="vi" src="assets/upload/config/vn.png" alt=""> Việt Nam
                        </a>
                    </li>
                    <li>
                        <a href="{!!  route( 'change_lang',[ 'en' ] )  !!}">
                            <img src="assets/upload/config/en.png" alt=""> English
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="clearfix clearfix_top"></div>
    <div class="row">
        {!!  Form::open( [ 'route' => 'apartments.store','file' => true, 'class'=>'form-horizontal form-label-left myForm','id'=>'myForm'  ] )  !!}
        <div class="col-md-9 col-sm-9 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <div class="item form-group">
                        {!!   htmlspecialchars_decode( Form::label( 'name', trans( 'config.name_pro' ).'<span class="required">*</span>', [ 'class' => 'control-label col-md-2 col-sm-2 col-xs-12' ]  ) )  !!}
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            {!!  Form::text( 'name','',[ 'placeholder' => trans( 'config.name_pro' ),'class' =>'form-control col-md-7 col-xs-12 input_slug' ] )  !!}
                            <p>
                                <small>* {{ trans( 'config.note_input_name' ) }} </small>
                            </p>
                        </div>
                    </div>
                    <div class="item form-group">
                        {!!   htmlspecialchars_decode( Form::label( 'slug', trans( 'config.slug' ).'<span class="required">*</span>', [ 'class' => 'control-label col-md-2 col-sm-2 col-xs-12' ]  ) )  !!}
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            {!!  Form::text( 'slug','',[ 'placeholder' => trans( 'config.slug' ),'class' =>'form-control col-md-7 col-xs-12 output_slug' ] )  !!}
                            <p>
                                <small>* {{ trans( 'config.note_input_slug' ) }}</small>
                            </p>
                        </div>
                    </div>
                    <div class="item form-group">
                        {!!   htmlspecialchars_decode( Form::label( 'list-category', trans( 'config.category_name' ).'<span class="required">*</span>', [ 'class' => 'control-label col-md-2 col-sm-2 col-xs-12' ]  ) )  !!}
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <select class="form-control" id="list_cat">
                                <option value="0">------- {{ trans( 'config.list_cat' ) }} ------</option>
                                @php
                                cate_parent($categories)
                                @endphp
                            </select>
                            <br>
                            <small>* {{ trans( 'config.list_cat' ) }}</small>
                            <p id="add_list"></p>
                            <br>
                            {!!  Form::hidden( 'category_id','' )  !!}
                        </div>
                    </div>
                    <div class="item form-group">
                        {!!   htmlspecialchars_decode( Form::label( 'price', trans( 'config.price' ).'<span class="required">*</span>', [ 'class' => 'control-label col-md-2 col-sm-2 col-xs-12' ]  ) )  !!}
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            {!!  Form::text( 'price','',[ 'placeholder' => trans( 'config.price' ),'class' =>'form-control col-md-7 col-xs-12' ] )  !!}
                            <p>
                                <small>* {{ trans( 'config.price_note' ) }}</small>
                            </p>
                        </div>
                    </div>
                    <div class="item form-group">
                        {!!   htmlspecialchars_decode( Form::label( 'Acreage', trans( 'config.acreage' ).'<span class="required">*</span>', [ 'class' => 'control-label col-md-2 col-sm-2 col-xs-12' ]  ) )  !!}
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            {!!  Form::text( 'acreage','',[ 'placeholder' => trans( 'config.acreage' ),'class' =>'form-control col-md-7 col-xs-12' ] )  !!}
                            <p>
                                <small>* {{ trans('config.acreage_note') }}</small>
                            </p>
                        </div>
                    </div>
                    <div class="item form-group">
                        {!!   htmlspecialchars_decode( Form::label( 'Address', trans( 'config.name_address' ).'<span class="required">*</span>', [ 'class' => 'control-label col-md-2 col-sm-2 col-xs-12' ]  ) )  !!}
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            {!!  Form::text( 'address','',[ 'placeholder' => trans( 'config.name_address' ),'class' =>'form-control col-md-7 col-xs-12' ] )  !!}
                            <p>
                                <small>* {{ trans( 'config.address' ) }}</small>
                            </p>
                        </div>
                    </div>
                    <div class="item form-group">
                        {!!   htmlspecialchars_decode( Form::label( 'Bedrooms', trans( 'config.bedrooms' ).'<span class="required">*</span>', [ 'class' => 'control-label col-md-2 col-sm-2 col-xs-12' ]  ) )  !!}
                        <div class="col-md-2 col-sm-2 col-xs-2">
                            {!! Form::select('bedrooms',config('size.array_option'), null, [ 'class' => 'form-control col-md-7 col-xs-12' ]) !!}
                        </div>
                        <div class="item form-group">
                            {!!   htmlspecialchars_decode( Form::label( 'Bathrooms', trans( 'config.bathrooms' ).'<span class="required">*</span>', [ 'class' => 'control-label col-md-2 col-sm-2 col-xs-12' ]  ) )  !!}
                            <div class="col-md-2 col-sm-2 col-xs-2">
                                {!! Form::select('bathrooms', config('size.array_option'), null, [ 'class' => 'form-control col-md-7 col-xs-12' ]) !!}
                            </div>
                            <div class="item form-group">
                                {!!   htmlspecialchars_decode( Form::label( 'Garage', trans( 'config.garage' ).'<span class="required">*</span>', [ 'class' => 'control-label col-md-2 col-sm-2 col-xs-12' ]  ) )  !!}
                                <div class="col-md-2 col-sm-2 col-xs-2">
                                    {!! Form::select('garage', config('size.array_option'), null, [ 'class' => 'form-control col-md-7 col-xs-12' ]) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item form-group">
                        {!!   htmlspecialchars_decode( Form::label( 'Images', trans( 'config.imgPro' ).'<span class="required">*</span>', [ 'class' => 'control-label col-md-2 col-sm-2 col-xs-12' ]  ) )  !!}
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <a href="javascript:open_popup( '{!! url( '' ) !!}/assets/filemanager/dialog.php?type=1&popup=1&field_id=fieldID' )" class="thumbnail open-file-img">
                                {!!  Html::image( 'assets/upload/config/no-image.png', 'no-image.png',[ 'class'=>'imagePreview' ] )  !!}
                            </a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <label class="control-label col-md-2 col-sm-2 col-xs-12"></label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        {!!  Form::hidden( 'image','',[ 'id' =>'fieldID' ] )  !!}
                        <a href="javascript:open_popup( '{!! url( '' ) !!}/assets/filemanager/dialog.php?type=1&popup=1&field_id=fieldID' )">
                            {!! Form::button('Choose IMG', [ 'class' => 'btn btn-sm btn-success choose-img' ]) !!}
                        </a>
                    </div>
                    <div class="form-group" id="img_product">
                        {!!   htmlspecialchars_decode( Form::label( 'ProductsImages', trans( 'config.productsImages' ).'<span class="required">*</span>', [ 'class' => 'control-label col-md-2 col-sm-2 col-xs-12' ]  ) )  !!}
                        <div class="col-md-10 col-sm-10 col-xs-6" id="img_color">
                            <ul id="list_img_pro_color">
                                <li>
                                    <div class="col-md-2 col-sm-2 col-xs-3">
                                        <a  href="javascript:open_popup( '{!! url( '' ) !!}/assets/filemanager/dialog.php?type=1&popup=1&field_id=fieldID_img_color' )" class="thumbnail open-file-img">
                                            {!!  Html::image( config('size.img_config').'no-image.png', 'no-image.png',[ 'class'=>'Preview_img_color' ] )  !!}
                                        </a>
                                        <small>* {{ trans('config.img_detail') }}</small>
                                        {!!  Form::hidden( 'img_detail[]','',[ 'id' =>'fieldID_img_color' ] )  !!}
                                        <a href="javascript:open_popup( '{!! url( '' ) !!}/assets/filemanager/dialog.php?type=1&popup=1&field_id=fieldID_img_color' )">
                                            {!! Form::button('Choose IMG', [ 'class' => 'btn btn-sm btn-success choose-img' ]) !!}
                                        </a>
                                        {!! htmlspecialchars_decode(Form::button(' <i class="fa fa-xs fa-trash"></i>', [ 'class' => 'btn btn-xs btn-danger del_pro_img' ])) !!}
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="item form-group">
                        {!!   htmlspecialchars_decode( Form::label( 'add-Images','', [ 'class' => 'control-label col-md-2 col-sm-2 col-xs-12' ]  ) )  !!}
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            {!! Form::button('add Images', [ 'class' => 'btn btn-success add_products_color' ]) !!}
                        </div>
                    </div>
                    <div class="item form-group">
                        {!!   htmlspecialchars_decode( Form::label( 'add-Images',trans( 'config.descriptions' ).' <span class="required">*</span>', [ 'class' => 'control-label col-md-2 col-sm-2 col-xs-12' ]  ))  !!}
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            {!! Form::textarea('desc' , null , ['class' => 'form-control article-ckeditor']) !!}
                            <small>* {{ trans('config.descriptions_note') }}</small>
                            <br>
                        </div>
                    </div>
                    <div class="item form-group">
                        {!!   htmlspecialchars_decode( Form::label( 'floor_plans',trans( 'config.floor_plans' ).' <span class="required">*</span>', [ 'class' => 'control-label col-md-2 col-sm-2 col-xs-12' ]  ))  !!}
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            {!! Form::textarea('floor_plans' , null , ['class' => 'form-control article-ckeditor']) !!}
                            <small>* {{ trans('config.floor_plans_note') }}</small>
                            <br>
                        </div>
                    </div>
                    <div class="item form-group">
                        {!!   htmlspecialchars_decode( Form::label( 'detail',trans( 'config.detail' ).' <span class="required">*</span>', [ 'class' => 'control-label col-md-2 col-sm-2 col-xs-12' ]  ))  !!}
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            {!! htmlspecialchars_decode(Form::textarea('detail' , '
                                <table width = 100%; border = none>
                                <caption><h3>PROPERTY DETAILS</h3></caption>
                                <tr>
                                <td>
                                <ul>
                                <li><strong>Property Id:</strong>215</li>
                                <li><strong>Price:</strong>$1240/ Month</li>
                                <li><strong>Property Type:</strong>House</li>
                                <li><strong>Bathrooms:</strong>3</li>
                                <li><strong>Bathrooms:</strong>2</li>
                                </ul>
                                </td>
                                <td>
                                <ul>
                                <li><strong>Property Lot Size:</strong>800 ft2</li>
                                <li><strong>Land area:</strong>230 ft2</li>
                                <li><strong>Year Built:</strong>2018</li>
                                <li><strong>Available From:</strong>2018</li>
                                <li><strong>Garages:</strong>2</li>
                                </ul>
                                </td>
                                <td>
                                <ul>
                                <li><strong>Sold:</strong>Yes</li>
                                <li><strong>City:</strong>Usa</li>
                                <li><strong>Parking:</strong>Yes</li>
                                <li><strong>Property Owner:</strong>Sohel Rana</li>
                                <li><strong>Zip Code:&nbsp;</strong>2451</li>
                                </ul>
                                </td>
                                </tr>
                            </table>' ,['class' => 'form-control article-ckeditor'])) !!}
                            <small>*  {{ trans('config.detail_note') }}</small>
                            <br>
                        </div>
                    </div>
                    <div class="item form-group">
                        {!!   htmlspecialchars_decode( Form::label( 'video',trans( 'config.video' ).' <span class="required">*</span>', [ 'class' => 'control-label col-md-2 col-sm-2 col-xs-12' ]  ))  !!}
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            {!! Form::text('video', '', ['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'link video on youtube ...']) !!}
                            <p>
                                <small>* {{ trans( 'config.video_note' ) }}</small>
                            </p>
                        </div>
                    </div>
                    <div class="item form-group">
                        {!!   htmlspecialchars_decode( Form::label( 'map',trans( 'config.map' ).' <span class="required">*</span>', [ 'class' => 'control-label col-md-2 col-sm-2 col-xs-12' ]  ))  !!}
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            {!! Form::text('map', '', ['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Api google map ...']) !!}
                            <p>
                                <small>* {{ trans( 'config.map_note' ) }}</small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <div class="item form-group">
                        {!!   htmlspecialchars_decode( Form::label( 'post',trans( 'config.post' ).' <span class="required">*</span>', [ 'class' => 'control-label col-md-3 col-sm-3 col-xs-12' ]  ))  !!}
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            @foreach ($posts as $post)
                            <div class="checkbox">
                                <label class="">
                                    <div class="icheckbox_flat-green" >
                                        <input value="{{ $post->id }}" type="checkbox" name="post_id[]" class="flat" >
                                        <ins class="iCheck-helper"></ins>
                                    </div>
                                    {{ $post->title }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="item form-group">
                        {!!   htmlspecialchars_decode( Form::label( 'status',trans( 'config.status' ).' <span class="required">*</span>', [ 'class' => 'control-label col-md-3 col-sm-3 col-xs-12' ]  ))  !!}
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <div class="radio">
                                <label class="">
                                    <div class="iradio_flat-green checked" >
                                        <input type="radio" class="flat" checked="" value="1" name="status">
                                        <ins class="iCheck-helper"></ins>
                                    </div>
                                    Checked
                                </label>
                            </div>
                            <div class="radio">
                                <label class="">
                                    <div class="iradio_flat-green checked" ><input type="radio" value="0" class="flat" name="status" >
                                        <ins class="iCheck-helper"></ins>
                                    </div>
                                    Un Checked
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="ln_solid"></div>
        <div class="form-group">
            <div class="col-md-12 col-sm-12 col-xs-12 btn-submit">
                <button id="send" type="submit" class="btn btn-success"><i class="fa fa-save"> Save</i></button>
                <button type="button" class="btn btn-primary" onclick="myFunction(  )">
                    <i class="fa fa-ban">Cancel</i>
                </button>
            </div>
        </div>
        {!!  Form::close(  )  !!}
    </div>
</div>

@endsection

