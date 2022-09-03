<?php
$lang = config('default_lang');
if (isset($role))
    $lang = $role->lang;
$lang = MiscHelper::getLang($lang);
$direction = MiscHelper::getLangDirection($lang);
$queryString = MiscHelper::getLangQueryStr();
?>
{!! APFrmErrHelp::showErrorsNotice($errors) !!}
@include('flash::message')
<div class="form-body">        
    {!! Form::hidden('id', null) !!}
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'lang') !!}" id="lang_div">
        {!! Form::label('lang', 'Language', ['class' => 'bold']) !!}                    
        {!! Form::select('lang', ['' => 'Select Language']+$languages, $lang, array('class'=>'form-control', 'id'=>'lang', 'onchange'=>'setLang(this.value);')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'lang') !!}                                       
    </div>
    
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'functional_area_id') !!}">
        {!! Form::label('functional_area_id', 'Functional Areas', ['class' => 'bold']) !!}
        {!! Form::select('functional_area_id', ['' => 'Select Functional Area']+$functional_areas, old('functional_area_id', (isset($role))? $role->functional_area_id:0),array('class'=>'form-control', 'id'=>'functional_area_id', 'placeholder'=>'Functional Areas')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'functional_area_id') !!}
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'role') !!}">
        {!! Form::label('role', 'Role', ['class' => 'bold']) !!}
        {!! Form::text('role', null, array('class'=>'form-control', 'id'=>'role', 'placeholder'=>'Role', 'dir'=>$direction)) !!}
        {!! APFrmErrHelp::showErrors($errors, 'role') !!}
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'is_default') !!}">
        {!! Form::label('is_default', 'Is Default?', ['class' => 'bold']) !!}
        <div class="radio-list">
            <?php
            $is_default_1 = 'checked="checked"';
            $is_default_2 = '';
            if (old('is_default', ((isset($role)) ? $role->is_default : 1)) == 0) {
                $is_default_1 = '';
                $is_default_2 = 'checked="checked"';
            }
            ?>
            <label class="radio-inline">
                <input id="default" name="is_default" type="radio" value="1" {{$is_default_1}} onchange="showHideRoleId();">
                Yes </label>
            <label class="radio-inline">
                <input id="not_default" name="is_default" type="radio" value="0" {{$is_default_2}} onchange="showHideRoleId();">
                No </label>
        </div>			
        {!! APFrmErrHelp::showErrors($errors, 'is_default') !!}
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'role_id') !!}" id="role_id_div">
        {!! Form::label('role_id', 'Default Role', ['class' => 'bold']) !!}                    
        {!! Form::select('role_id', ['' => 'Select Role'], null, array('class'=>'form-control', 'id'=>'role_id')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'role_id') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'is_active') !!}">
        {!! Form::label('is_active', 'Is Active?', ['class' => 'bold']) !!}
        <div class="radio-list">
            <?php
            $is_active_1 = 'checked="checked"';
            $is_active_2 = '';
            if (old('is_active', ((isset($role)) ? $role->is_active : 1)) == 0) {
                $is_active_1 = '';
                $is_active_2 = 'checked="checked"';
            }
            ?>
            <label class="radio-inline">
                <input id="active" name="is_active" type="radio" value="1" {{$is_active_1}}>
                Active </label>
            <label class="radio-inline">
                <input id="not_active" name="is_active" type="radio" value="0" {{$is_active_2}}>
                In-Active </label>
        </div>			
        {!! APFrmErrHelp::showErrors($errors, 'is_active') !!}
    </div>	
    <div class="form-actions">
        <?php 
        $btn = (isset($role->id)) ? 'Update <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>' : 'Save <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>';
        ?>
        {!! Form::button($btn, array('class'=>'btn btn-large btn-primary', 'type'=>'submit')) !!}
    </div>
</div>
@push('scripts')
<script type="text/javascript">
    function setLang(lang) {
        window.location.href = "<?php echo url(Request::url()) . $queryString; ?>" + lang;
    }
    function showHideRoleId() {
        $('#role_id_div').hide();
        var is_default = $("input[name='is_default']:checked").val();
        if (is_default == 0) {
            $('#role_id_div').show();
        }
    }
    showHideRoleId();
    
</script>
@endpush