<fieldset>
    {assign var="intarget_id" value=$intarget_id|default:""}
    {assign var="intarget_email" value=$intarget_email|default:""}
    {assign var="intarget_key" value=$intarget_key|default:""}

    {if $intarget_id}
        <p><b>{__("intarget.success")}</b></p>
    {/if}

    <div id="connect_settings">
        <input type="hidden" name="result_ids"
               value="connect_settings,addon_upgrade"/>
        <div class="control-group">
            <label class="cm-required cm-email"
                   for="elm_intarget_email">{__("email")}:</label>

            <div class="controls">
                <input type="text" id="elm_tw_email" name="intarget[email]"
                       value="{$intarget_email}" class="input-text-large"
                       size="60"/ {if $intarget_id}disabled="disabled"{/if}>
                {if $intarget_id}<img src="{$images_dir}/addons/intarget/images/ok.png">{/if}
            </div>
        </div>

        <div class="control-group">
            <label for="elm_intarget_password" class="cm-required">{__("apikey")}:</label>

            <div class="controls">
                <input type="text" id="elm_intarget_password" name="intarget[apikey]"
                       class="input-text-large" size="32" maxlength="32" value="{$intarget_key}"
                       autocomplete="off"/ {if $intarget_id}disabled="disabled"{/if}>
                {if $intarget_id}<img src="{$images_dir}/addons/intarget/images/ok.png">{/if}
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                {include file="buttons/button.tpl" but_role="submit" but_meta="btn-primary cm-skip-avail-switch" but_name="dispatch[addons.intarget_connect]" but_text=__("intarget_connect") but_target_id="connect_settings"}
            </div>
        </div>
        {if $intarget_id}
            <p>{__('intarget.help5')}</p>
        {/if}
        <p>{__('intarget.help3')}</p>
        <p>{__('intarget.help4')}</p>
    </div>

</fieldset>
