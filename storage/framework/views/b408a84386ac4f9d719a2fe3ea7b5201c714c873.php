<?php $__env->startSection('title'); ?>
    <title><?php echo e(get_string('create_property') . ' - ' . get_setting('site_name', 'site')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->startSection('page_title'); ?>
    <h3 class="page-title mbot10"><?php echo e(get_string('create_property')); ?></h3>
<?php $__env->stopSection(); ?>
<div class="col s12">
    <?php if(!$errors->isEmpty()): ?>
        <span class="wrong-error">* <?php echo e(get_string('validation_error')); ?></span>
    <?php endif; ?>
    <?php echo Form::open(['method' => 'post', 'url' => route('admin.property.store'), 'files' => 'true']); ?>

        <div class="panel">
            <div class="panel-heading">
                <ul class="nav nav-tabs">
                    <li class="tab active"><a href="#content-panel" data-toggle="tab"><?php echo e(get_string('content')); ?></a></li>
                    <li class="tab"><a href="#data-panel" data-toggle="tab"><?php echo e(get_string('data')); ?></a></li>
                    <li class="tab"><a href="#property-panel" data-toggle="tab"><?php echo e(get_string('property')); ?></a></li>
                    <li class="tab"><a href="#meta-panel" data-toggle="tab"><?php echo e(get_string('meta')); ?></a></li>
                </ul>
            </div>
        <div class="panel-body">
            <div class="tab-content">
                <div id="content-panel" class="tab-pane active">
                    <div class="panel">
                        <div class="panel-heading">
                            <ul class="nav nav-tabs">
                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <li class="tab <?php echo e($language->default ? 'active' : ''); ?>"><a href="#lang<?php echo e($language->id); ?>" data-parent="#content" data-toggle="tab"><img src="<?php echo e($language->flag); ?>"/><span><?php echo e($language->language); ?></span></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <div class="tab-content">
                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <div id="lang<?php echo e($language->id); ?>" class="tab-pane <?php echo e($language->default ? 'active' : ''); ?>">
                                        <div class="col s12">
                                            <div class="form-group  <?php echo e($errors->has('name.'.$language->id.'') ? 'has-error' : ''); ?>">
                                                <?php echo e(Form::text('name['.$language->id.']', null, ['class' => 'form-control', 'placeholder' => get_string('enter_property_name')])); ?>

                                                <?php echo e(Form::label('name['.$language->id.']', get_string('property_name'))); ?>

                                                <?php if($errors->has('name.'.$language->id.'')): ?>
                                                    <span class="wrong-error">* <?php echo e($errors->first('name.'.$language->id.'')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col s12">
                                            <?php echo e(Form::textarea('description['.$language->id.']', null, ['class' => 'hidden desc-content'])); ?>

                                            <?php if($errors->has('description.'.$language->id.'')): ?>
                                                <span class="wrong-error">* <?php echo e($errors->first('description.'.$language->id.'')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="data-panel" class="tab-pane">
                    <div class="col s12 clearfix">
                        <h5 class="section-title"><?php echo e(get_string('general')); ?></h5>
                    </div>
                    <div class="col m4 s6">
                        <div class="form-group  <?php echo e($errors->has('category_id') ? 'has-error' : ''); ?>">
                            <?php echo e(Form::select('category_id', $categories, null, ['class' => 'category-select form-control', 'placeholder' => get_string('choose_category')])); ?>

                            <?php if($errors->has('category_id')): ?>
                                <span class="wrong-error">* <?php echo e($errors->first('category_id')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col m4 s6">
                        <div class="form-group  <?php echo e($errors->has('location_id') ? 'has-error' : ''); ?>">
                            <?php echo e(Form::select('location_id', $locations, null, ['class' => 'location-select form-control', 'placeholder' => get_string('choose_location')])); ?>

                            <?php if($errors->has('location_id')): ?>
                                <span class="wrong-error">* <?php echo e($errors->first('location_id')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col l3 m4 s6 right right-align mbot0">
                        <div class="form-group">
                            <div class="switch">
                                <label>
                                    <?php echo e(get_string('standard')); ?><?php echo e(Form::checkbox('featured', 0, false, ['value' => '0', 'id' => 'activeSwitch', 'class' => 'form-control'])); ?><span class="lever"></span><?php echo e(get_string('featured')); ?>

                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 well checkbox-grid">
                        <p><?php echo e(get_string('choose_features')); ?></p>
                        <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <div class="col s2">
                                <div class="form-group">
                                    <input type="checkbox" name="features[]" <?php if(old('features') && in_array_r($feature->id, old('features'))): ?> checked <?php endif; ?> value="<?php echo e($feature->id); ?>" class="filled-in primary-color" id="<?php echo e($feature->id); ?>" />
                                    <label for="<?php echo e($feature->id); ?>"></label>
                                    <span class="checkbox-label"><?php echo e($feature->feature[$default_language->id]); ?></span>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </div>
                    <div class="col s12 clearfix">
                        <h5 class="section-title"><?php echo e(get_string('media')); ?></h5>
                    </div>
                    <div class="col l12 m12 s12">
                        <div id="file-dropzone" class="dropzone">
                            <div class="dz-message"><?php echo e(get_string('upload_images')); ?><br/><i class="material-icons medium">cloud_upload</i>
                            </div>
                            <div class="fallback">
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col s12">
                        <div class="form-group  <?php echo e($errors->has('video') ? 'has-error' : ''); ?>">
                            <?php echo e(Form::text('video', null, ['class' => 'form-control', 'placeholder' => get_string('video_id')])); ?>

                            <?php echo e(Form::label('video', get_string('video_id'))); ?>

                            <?php if($errors->has('video')): ?>
                                <span class="wrong-error">* <?php echo e($errors->first('video')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div> -->
                    <div class="col s12 clearfix">
                        <h5 class="section-title"><?php echo e(get_string('location')); ?></h5>
                    </div>
                    <div class="col s12">
                        <div class="row mbot0">
                            <div class="col l6 m12 s12">
                                <div class="row mbot0">
                                    <div class="col l12 m12 s12">
                                        <div class="form-group  <?php echo e($errors->has('location.address') ? 'has-error' : ''); ?>">
                                            <?php echo e(Form::text('location[address]', null, ['class' => 'form-control', 'placeholder' => get_string('address')])); ?>

                                            <?php echo e(Form::label('location[address]', get_string('address'))); ?>

                                            <?php if($errors->has('location.address')): ?>
                                                <span class="wrong-error">* <?php echo e($errors->first('location.address')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col l12 m12 s12">
                                        <div class="form-group  <?php echo e($errors->has('location.city') ? 'has-error' : ''); ?>">
                                            <?php echo e(Form::text('location[city]', null, ['class' => 'form-control', 'placeholder' => get_string('city')])); ?>

                                            <?php echo e(Form::label('location[city]', get_string('city'))); ?>

                                            <?php if($errors->has('location.city')): ?>
                                                <span class="wrong-error">* <?php echo e($errors->first('location.city')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col l12 m12 s12">
                                        <div class="form-group  <?php echo e($errors->has('location.state') ? 'has-error' : ''); ?>">
                                            <?php echo e(Form::text('location[state]', null, ['class' => 'form-control', 'placeholder' => get_string('state')])); ?>

                                            <?php echo e(Form::label('location[state]', get_string('state'))); ?>

                                            <?php if($errors->has('location.state')): ?>
                                                <span class="wrong-error">* <?php echo e($errors->first('location.state')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col l12 m12 s12">
                                        <div class="form-group  <?php echo e($errors->has('location.country') ? 'has-error' : ''); ?>">
                                            <?php echo e(Form::text('location[country]', null, ['class' => 'form-control', 'placeholder' => get_string('country')])); ?>

                                            <?php echo e(Form::label('location[country]', get_string('country'))); ?>

                                            <?php if($errors->has('location.country')): ?>
                                                <span class="wrong-error">* <?php echo e($errors->first('location.country')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col l12 m12 s12">
                                        <div class="form-group">
                                            <?php echo e(Form::text('location[geo_lon]', null, ['class' => 'form-control', 'placeholder' => get_string('geo_lon')])); ?>

                                            <?php echo e(Form::label('location[geo_lon]', get_string('geo_lon'))); ?>

                                        </div>
                                    </div>
                                    <div class="col l12 m12 s12">
                                        <div class="form-group">
                                            <?php echo e(Form::text('location[geo_lat]', null, ['class' => 'form-control', 'placeholder' => get_string('geo_lat')])); ?>

                                            <?php echo e(Form::label('location[geo_lat]', get_string('geo_lat'))); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col l6 m12 s12">
                                <div class="form-group  <?php echo e(($errors->has('location.geo_lon') || ($errors->has('location.geo_lon')))  ? 'has-error' : ''); ?>">
                                    <?php echo e(Form::text('marker', null, ['class' => 'form-control autocomplete', 'id' => 'address-map', 'placeholder' => get_string('drop_marker')])); ?>

                                    <?php echo e(Form::label('marker', get_string('drop_marker'))); ?>

                                    <?php if($errors->has('location.geo_lon') || $errors->has('location.geo_lat')): ?>
                                        <span class="wrong-error">* <?php echo e(get_string('google_address_required')); ?> </span>
                                    <?php endif; ?>
                                </div>
                                <div id="google-map">
                                </div>
                                <span class="field-info"><?php echo e(get_string('drag_marker')); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col s12">
                        <ul class="collapsible collapsible-accordion">
                            <li>
                                <div class="collapsible-header"><span><?php echo e(get_string('contact')); ?></span><i class="material-icons small accordion-active">remove_circle</i><i class="material-icons small accordion-disabled">add_circle</i>
                                    <i class="material-icons small color-red <?php echo e(($errors->has('contact.tel1') || $errors->has('contact.tel2') || $errors->has('contact.fax') || $errors->has('contact.email') || $errors->has('contact.web')) ? '' : 'hidden'); ?>">report_problem</i>
                                </div>
                                <div class="collapsible-body">
                                    <div class="col l4 m6 s12">
                                        <div class="form-group  <?php echo e($errors->has('contact.tel1') ? 'has-error' : ''); ?>">
                                            <?php echo e(Form::text('contact[tel1]', null, ['class' => 'form-control', 'placeholder' => get_string('contact_tel1')])); ?>

                                            <?php echo e(Form::label('contact[tel1]', get_string('contact_tel1'))); ?>

                                            <?php if($errors->has('contact.tel1')): ?>
                                                <span class="wrong-error">* <?php echo e($errors->first('contact.tel1')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col l4 m6 s12">
                                        <div class="form-group  <?php echo e($errors->has('contact.tel2') ? 'has-error' : ''); ?>">
                                            <?php echo e(Form::text('contact[tel2]', null, ['class' => 'form-control', 'placeholder' => get_string('contact_tel2')])); ?>

                                            <?php echo e(Form::label('contact[tel2]', get_string('contact_tel2'))); ?>

                                            <?php if($errors->has('contact.tel3')): ?>
                                                <span class="wrong-error">* <?php echo e($errors->first('contact.tel2')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col l4 m6 s12">
                                        <div class="form-group  <?php echo e($errors->has('contact.fax') ? 'has-error' : ''); ?>">
                                            <?php echo e(Form::text('contact[fax]', null, ['class' => 'form-control', 'placeholder' => get_string('fax')])); ?>

                                            <?php echo e(Form::label('contact[fax]', get_string('fax'))); ?>

                                            <?php if($errors->has('contact.fax')): ?>
                                                <span class="wrong-error">* <?php echo e($errors->first('contact.fax')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col l4 m6 s12">
                                        <div class="form-group  <?php echo e($errors->has('contact.email') ? 'has-error' : ''); ?>">
                                            <?php echo e(Form::text('contact[email]', null, ['class' => 'form-control', 'placeholder' => get_string('email')])); ?>

                                            <?php echo e(Form::label('contact[email]', get_string('email'))); ?>

                                            <?php if($errors->has('contact.email')): ?>
                                                <span class="wrong-error">* <?php echo e($errors->first('contact.email')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col l4 m6 s12">
                                        <div class="form-group  <?php echo e($errors->has('contact.web') ? 'has-error' : ''); ?>">
                                            <?php echo e(Form::text('contact[web]', null, ['class' => 'form-control', 'placeholder' => get_string('website')])); ?>

                                            <?php echo e(Form::label('contact[web]', get_string('website'))); ?>

                                            <?php if($errors->has('contact.web')): ?>
                                                <span class="wrong-error">* <?php echo e($errors->first('contact.web')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col s12">
                        <ul class="collapsible collapsible-accordion">
                            <li>
                                <div class="collapsible-header"><span><?php echo e(get_string('social_networks')); ?></span><i class="material-icons small accordion-active">remove_circle</i><i class="material-icons small accordion-disabled">add_circle</i></div>
                                <div class="collapsible-body">
                                    <div class="col l4 m6 s12">
                                        <div class="form-group  <?php echo e($errors->has('social[facebook]') ? 'has-error' : ''); ?>">
                                            <?php echo e(Form::text('social[facebook]', null, ['class' => 'form-control', 'placeholder' => get_string('facebook')])); ?>

                                            <?php echo e(Form::label('social[facebook]', get_string('facebook'))); ?>

                                            <?php if($errors->has('social[facebook]')): ?>
                                                <span class="wrong-error">* <?php echo e($errors->first('social[facebook]')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col l4 m6 s12">
                                        <div class="form-group  <?php echo e($errors->has('social[gplus]') ? 'has-error' : ''); ?>">
                                            <?php echo e(Form::text('social[gplus]', null, ['class' => 'form-control', 'placeholder' => get_string('google_plus')])); ?>

                                            <?php echo e(Form::label('social[gplus]', get_string('google_plus'))); ?>

                                            <?php if($errors->has('social[gplus]')): ?>
                                                <span class="wrong-error">* <?php echo e($errors->first('social[gplus]')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col l4 m6 s12">
                                        <div class="form-group  <?php echo e($errors->has('social[twitter]') ? 'has-error' : ''); ?>">
                                            <?php echo e(Form::text('social[twitter]', null, ['class' => 'form-control', 'placeholder' => get_string('twitter')])); ?>

                                            <?php echo e(Form::label('social[twitter]', get_string('twitter'))); ?>

                                            <?php if($errors->has('social[twitter]')): ?>
                                                <span class="wrong-error">* <?php echo e($errors->first('social[twitter]')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col l4 m6 s12">
                                        <div class="form-group  <?php echo e($errors->has('social[instagram]') ? 'has-error' : ''); ?>">
                                            <?php echo e(Form::text('social[instagram]', null, ['class' => 'form-control', 'placeholder' => get_string('instagram')])); ?>

                                            <?php echo e(Form::label('social[instagram]', get_string('instagram'))); ?>

                                            <?php if($errors->has('social[instagram]')): ?>
                                                <span class="wrong-error">* <?php echo e($errors->first('social[instagram]')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col l4 m6 s12">
                                        <div class="form-group  <?php echo e($errors->has('social[pinterest]') ? 'has-error' : ''); ?>">
                                            <?php echo e(Form::text('social[pinterest]', null, ['class' => 'form-control', 'placeholder' => get_string('pinterest')])); ?>

                                            <?php echo e(Form::label('social[pinterest]', get_string('pinterest'))); ?>

                                            <?php if($errors->has('social[pinterest]')): ?>
                                                <span class="wrong-error">* <?php echo e($errors->first('social[pinterest]')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col l4 m6 s12">
                                        <div class="form-group  <?php echo e($errors->has('social[linkedin]') ? 'has-error' : ''); ?>">
                                            <?php echo e(Form::text('social[linkedin]', null, ['class' => 'form-control', 'placeholder' => get_string('linkedin')])); ?>

                                            <?php echo e(Form::label('social[linkedin]', get_string('linkedin'))); ?>

                                            <?php if($errors->has('social[linkedin]')): ?>
                                                <span class="wrong-error">* <?php echo e($errors->first('social[linkedin]')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="hidden-fields hidden">
                    </div>
                </div>
                <div id="property-panel" class="tab-pane">
                    <div class="col s12 clearfix">
                        <h5 class="section-title"><?php echo e(get_string('property_info')); ?></h5>
                    </div>
                    <div class="col l6 m6 s12">
                        <div class="form-group  <?php echo e($errors->has('property_info.size') ? 'has-error' : ''); ?>">
                            <?php echo e(Form::text('property_info[size]', null, ['class' => 'form-control', 'placeholder' => get_string('property_size')])); ?>

                            <?php echo e(Form::label('property_info[size]', get_string('property_size'))); ?>

                            <?php if($errors->has('property_info.size')): ?>
                                <span class="wrong-error">* <?php echo e($errors->first('property_info.size')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col l6 m6 s12">
                        <div class="form-group  <?php echo e($errors->has('guest_number') ? 'has-error' : ''); ?>">
                            <?php echo e(Form::text('guest_number', null, ['class' => 'form-control', 'placeholder' => get_string('guest_number')])); ?>

                            <?php echo e(Form::label('guest_number', get_string('guest_number'))); ?>

                            <?php if($errors->has('guest_number')): ?>
                                <span class="wrong-error">* <?php echo e($errors->first('guest_number')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col l6 m6 s12">
                        <div class="form-group  <?php echo e($errors->has('rooms') ? 'has-error' : ''); ?>">
                            <?php echo e(Form::text('rooms', null, ['class' => 'form-control', 'placeholder' => get_string('property_rooms')])); ?>

                            <?php echo e(Form::label('rooms', get_string('property_rooms'))); ?>

                            <?php if($errors->has('rooms')): ?>
                                <span class="wrong-error">* <?php echo e($errors->first('rooms')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col l6 m6 s12">
                        <div class="form-group  <?php echo e($errors->has('property_info.bedrooms') ? 'has-error' : ''); ?>">
                            <?php echo e(Form::text('property_info[bedrooms]', 0, ['class' => 'form-control', 'placeholder' => get_string('property_bedrooms')])); ?>

                            <?php echo e(Form::label('property_info[bedrooms]', get_string('property_bedrooms'))); ?>

                            <?php if($errors->has('property_info.bedrooms')): ?>
                                <span class="wrong-error">* <?php echo e($errors->first('property_info.bedrooms')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col l6 m6 s12">
                        <div class="form-group  <?php echo e($errors->has('property_info.bathrooms') ? 'has-error' : ''); ?>">
                            <?php echo e(Form::text('property_info[bathrooms]', 0, ['class' => 'form-control', 'placeholder' => get_string('property_bathrooms')])); ?>

                            <?php echo e(Form::label('property_info[bathrooms]', get_string('property_bathrooms'))); ?>

                            <?php if($errors->has('property_info.bathrooms')): ?>
                                <span class="wrong-error">* <?php echo e($errors->first('property_info.bathrooms')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col s12 clearfix">
                        <h5 class="section-title"><?php echo e(get_string('property_prices')); ?></h5>
                    </div>
                    <div class="col l6 m6 s12">
                        <div class="form-group  <?php echo e($errors->has('price_per_night') ? 'has-error' : ''); ?>">
                            <?php echo e(Form::text('price_per_night', null, ['class' => 'form-control', 'placeholder' => get_string('price_per_night')])); ?>

                            <?php echo e(Form::label('price_per_night', get_string('price_per_night'))); ?>

                            <?php if($errors->has('price_per_night')): ?>
                                <span class="wrong-error">* <?php echo e($errors->first('price_per_night')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col l6 m6 s12">
                        <div class="form-group  <?php echo e($errors->has('prices.d_5') ? 'has-error' : ''); ?>">
                            <?php echo e(Form::text('prices[d_5]', null, ['class' => 'form-control', 'placeholder' => get_string('price_d_5')])); ?>

                            <?php echo e(Form::label('prices[d_5]', get_string('price_d_5'))); ?>

                            <?php if($errors->has('prices.d_5')): ?>
                                <span class="wrong-error">* <?php echo e($errors->first('prices.d_5')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col l6 m6 s12">
                        <div class="form-group  <?php echo e($errors->has('prices.d_15') ? 'has-error' : ''); ?>">
                            <?php echo e(Form::text('prices[d_15]', null, ['class' => 'form-control', 'placeholder' => get_string('price_d_15')])); ?>

                            <?php echo e(Form::label('prices[d_15]', get_string('price_d_15'))); ?>

                            <?php if($errors->has('prices.d_15')): ?>
                                <span class="wrong-error">* <?php echo e($errors->first('prices.d_15')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col l6 m6 s12">
                        <div class="form-group  <?php echo e($errors->has('prices.d_30') ? 'has-error' : ''); ?>">
                            <?php echo e(Form::text('prices[d_30]', null, ['class' => 'form-control', 'placeholder' => get_string('price_d_30')])); ?>

                            <?php echo e(Form::label('prices[d_30]', get_string('price_d_30'))); ?>

                            <?php if($errors->has('prices.d_30')): ?>
                                <span class="wrong-error">* <?php echo e($errors->first('prices.d_30')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col s12 clearfix">
                        <h5 class="section-title"><?php echo e(get_string('property_fees')); ?></h5>
                    </div>
                    <div class="col l6 m6 s12">
                        <div class="form-group  <?php echo e($errors->has('fees.city_fee') ? 'has-error' : ''); ?>">
                            <?php echo e(Form::text('fees[city_fee]', 0, ['class' => 'form-control', 'placeholder' => get_string('city_fee')])); ?>

                            <?php echo e(Form::label('fees[city_fee]', get_string('city_fee'))); ?>

                            <?php if($errors->has('fees.city_fee')): ?>
                                <span class="wrong-error">* <?php echo e($errors->first('fees.city_fee')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col l6 m6 s12">
                        <div class="form-group  <?php echo e($errors->has('fees.cleaning_fee') ? 'has-error' : ''); ?>">
                            <?php echo e(Form::text('fees[cleaning_fee]', 0, ['class' => 'form-control', 'placeholder' => get_string('cleaning_fee')])); ?>

                            <?php echo e(Form::label('fees[cleaning_fee]', get_string('cleaning_fee'))); ?>

                            <?php if($errors->has('fees.cleaning_fee')): ?>
                                <span class="wrong-error">* <?php echo e($errors->first('fees.cleaning_fee')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col s12 clearfix">
                        <h5 class="section-title">Sales or Rentals</h5>
                    </div>
                    <div class="col l6 m6 s12 clearfix">
                        <div class="form-group  <?php echo e($errors->has('sale_rent') ? 'has-error' : ''); ?>">
                            <form action="" class="form-control">
                                <div class="form-group">
                                    <div>
                                        <input type="checkbox" class="filled-in primary-color" id="contactChoice1" name="sale_rent[]" value="sales">
                                        <label for="contactChoice1"></label>
                                        <span class="checkbox-label">Sales</span>
                                    </div>
                                    <div>
                                        <input type="checkbox"  class="filled-in primary-color" id="contactChoice2" name="sale_rent[]" value="rentals">
                                        <label for="contactChoice2"></label>
                                        <span class="checkbox-label">Rentals</span>
                                    </div>
                                </div>
                            </form>
                            <?php if($errors->has('sale_rent')): ?>
                                <span class="wrong-error">* Choose one of the options</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div id="meta-panel" class="tab-pane">
                    <div class="col s12 clearfix">
                        <h5 class="section-title"><?php echo e(get_string('meta')); ?></h5>
                    </div>
                    <div class="col l6 m6 s12">
                        <div class="form-group">
                            <?php echo e(Form::text('meta_title', null, ['class' => 'form-control', 'placeholder' => get_string('meta_title')])); ?>

                            <?php echo e(Form::label('meta_title', get_string('meta_title'))); ?>

                        </div>
                    </div>
                    <div class="col l6 m6 s12">
                        <div class="form-group">
                            <?php echo e(Form::text('meta_keywords', null, ['class' => 'form-control', 'placeholder' => get_string('meta_keywords')])); ?>

                            <?php echo e(Form::label('meta_keywords', get_string('meta_keywords'))); ?>

                        </div>
                    </div>
                    <div class="col s12">
                        <div class="form-group">
                            <?php echo e(Form::textarea('meta_description', null, ['class' => 'form-control', 'placeholder' => get_string('meta_description')])); ?>

                            <?php echo e(Form::label('meta_description', get_string('meta_description'))); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col clearfix s12 mtop10">
                <div class="form-group">
                    <button class="btn waves-effect" type="submit" name="action"><?php echo e(get_string('create_property')); ?></button>
                    <a href="<?php echo e(route('admin.property.index')); ?>" class="btn waves-effect"><?php echo e(get_string('property_all')); ?></a>
                </div>
            </div>
            <?php echo e(Form::hidden('user_id', Auth::user()->id)); ?>

            <?php echo Form::close(); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(get_setting('google_map_key', 'site')); ?>&libraries=places"></script>
    <script>
        $(document).ready(function(){
            $('.desc-content').summernote({
                height: 200,
                maxwidth: false,
                minwidth: false,
                placeholder: '<?php echo e(get_string('enter_property_content')); ?>',
                disableDragAndDrop: true,
                toolbar: [
                    ["style", ["style"]],
                    ["font", ["bold", "underline", "clear"]],
                    ["color", ["color"]],
                    ["para", ["ul", "ol", "paragraph"]],
                ],callbacks: {
                    onPaste: function (e) {
                        var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                        e.preventDefault();
                        document.execCommand('insertText', false, bufferText);
                    }
                }
            });
        });

        $(document).ready(function(){
            Dropzone.autoDiscover = false;
            $('#file-dropzone').dropzone({
                url: '<?php echo e(url('/image_handler/upload')); ?>',
                paramsName: 'image',
                params: {_token: $('[name=_token]').val()},
                maxFilesize: 100,
                uploadMultiple: false,
                addRemoveLinks: true,
                maxfilesize: 1,
                parallelUploads: 1,
                maxFiles: 6,
                init: function() {

                    this.on('success', function(file, json) {
                        var selector = file._removeLink;
                        $(selector).attr('data-dz-remove', json.data);
                        $('.hidden-fields').append('<input type="hidden" name="images[]" value="'+ json.data +'">');
                    });

                    this.on('addedfile', function(file) {

                    });

                    this.on("removedfile", function(file) {
                        var selector = file._removeLink;
                        var data = $(selector).attr('data-dz-remove');
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo e(url('/image_handler/delete')); ?>',
                            data: {data: data, _token: $('[name=_token]').val()},
                            dataType: 'html',
                            success: function(msg){
                                $('.hidden-fields').find('[value="'+ data +'"]').remove();
                            }
                        });
                    });
                }
            });
        });
        // Google Map
        $(document).ready(function() {
            if(typeof google !== 'undefined' && google){
                var map = new google.maps.Map(document.getElementById('google-map'), {
                    center:{
                        lat: 40.118706,
                        lng: -102.796208
                    },
                    zoom:4
                });
                var marker = new google.maps.Marker({
                    position: {
                        lat: 40.118706,
                        lng: -102.796208
                    },
                    map: map,
                    draggable: true
                });
                var infowindow = new google.maps.InfoWindow();
                var searchBox = document.getElementById('address-map');
                var autocomplete = new google.maps.places.Autocomplete(searchBox);

                autocomplete.bindTo('bounds', map);
                autocomplete.addListener('place_changed', function() {
                    infowindow.close();
                    marker.setVisible(false);
                    var place = autocomplete.getPlace();
                    if (!place.geometry) {
                        return;
                    }

                    // If the place has a geometry, then present it on a map.
                    if (place.geometry.viewport) {
                        map.fitBounds(place.geometry.viewport);
                    } else {
                        map.setCenter(place.geometry.location);
                        map.setZoom(15);
                    }

                    marker.setPosition(place.geometry.location);
                    marker.setVisible(true);

                    var address = '';
                    if (place.address_components) {
                        address = [
                            (place.address_components[0] && place.address_components[0].short_name || ''),
                            (place.address_components[1] && place.address_components[1].short_name || ''),
                            (place.address_components[2] && place.address_components[2].short_name || '')
                        ].join(' ');
                    }

                    infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
                    infowindow.open(map, marker);
                });

                google.maps.event.addListener(marker, 'position_changed', function () {
                    var lat = marker.getPosition().lat();
                    var lng = marker.getPosition().lng();
                    $('[name="location[geo_lon]"]').val(lat);
                    $('[name="location[geo_lat]"]').val(lng);
                });
                $('a[href$="data-panel"]').click(function(){
                    var currCenter = map.getCenter();
                    setTimeout(function(){
                        google.maps.event.trigger($("#google-map")[0], 'resize');
                        map.setCenter(currCenter);
                    }, 50);
                });
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>