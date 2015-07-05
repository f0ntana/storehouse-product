<!-- ___ -->
<!-- start partial create -->
<form class="form-horizontal" ng-submit="save(product)">
<fieldset>

<!-- Form Name -->
<legend><section id="addProduct">{{ trans('storehouse-product::product.product.create.heading')}}</section></legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">{{ trans('storehouse-product::product.product.fields.name')}}</label>
  <div class="col-md-4">
  <input id="name" name="name" type="text" placeholder="{{ trans('storehouse-product::product.product.fields.name')}}" class="form-control input-md" ng-model="product.name">
  <span class="help-block">{{ trans('storehouse-product::product.product.help.name')}}</span>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="description">{{ trans('storehouse-product::product.product.fields.description')}}</label>
  <div class="col-md-4">
    <textarea class="form-control" id="description" name="description"  ng-model="product.description"></textarea>
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group text-right">
  <div class="col-md-8">
    <button id="button1id" name="button1id" class="btn btn-primary">{{ trans('storehouse-product::product.general.actions.add')}}</button>
    <button id="button2id" name="button2id" class="btn btn-warning">{{ trans('storehouse-product::product.general.actions.cancel')}}</button>
  </div>
</div>

</fieldset>
</form>
<!-- end partial create -->
