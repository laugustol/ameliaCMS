<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
    <p><?=template_contact_me_text?></p>
    <form name="sentMessage" id="contactForm" novalidate>
        <div class="row control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
                <label><?=template_name?></label>
                <input type="text" class="form-control" placeholder="<?=template_name?>" id="name" required data-validation-required-message="<?=template_name_alert?>">
                <p class="help-block text-danger"></p>
            </div>
        </div>
        <div class="row control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
                <label><?=template_email?></label>
                <input type="email" class="form-control" placeholder="<?=template_email?>" id="email" required data-validation-required-message="<?=template_email_alert?>">
                <p class="help-block text-danger"></p>
            </div>
        </div>
        <div class="row control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
                <label><?=template_phone?></label>
                <input type="tel" class="form-control" placeholder="<?=template_phone?>" id="phone" required data-validation-required-message="<?=template_phone_alert?>">
                <p class="help-block text-danger"></p>
            </div>
        </div>
        <div class="row control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
                <label><?=template_message?></label>
                <textarea rows="5" class="form-control" placeholder="<?=template_message?>" id="message" required data-validation-required-message="<?=template_message_alert?>"></textarea>
                <p class="help-block text-danger"></p>
            </div>
        </div>
        <br>
        <div id="success"></div>
        <div class="row">
            <div class="form-group col-xs-12">
                <button type="submit" class="btn btn-default"><?=template_send?></button>
            </div>
        </div>
    </form>
</div>