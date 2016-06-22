<fieldset>
    {assign var="intarget_id" value=$intarget_id|default:""}
    {assign var="intarget_email" value=$intarget_email|default:""}
    {assign var="intarget_key" value=$intarget_key|default:""}
    <div id="connect_settings">
        <input type="hidden" name="result_ids"
               value="connect_settings,addon_upgrade"/>

        {if $intarget_id}
            <p>{__("intarget.success")}</p>
        {/if}
        <div class="control-group">
            <label class="cm-required cm-email"
                   for="elm_intarget_email">{__("email")}:</label>

            <div class="controls">
                <input type="text" id="elm_tw_email" name="intarget[email]"
                       value="{$intarget_email}" class="input-text-large" size="60"/>
            </div>
        </div>

        <div class="control-group">
            <label for="elm_intarget_password" class="cm-required">{__("apikey")}:</label>

            <div class="controls">
                <input type="text" id="elm_intarget_password" name="intarget[apikey]"
                       class="input-text-large" size="32" maxlength="32" value="{$intarget_key}"
                       autocomplete="off"/>
            </div>
            <p>key={$intarget_key}</p>
            <p>email={$intarget_email}</p>
        </div>

        <div class="control-group">
            <div class="controls">
                {include file="buttons/button.tpl" but_role="submit" but_meta="btn-primary cm-skip-avail-switch" but_name="dispatch[addons.intarget_connect]" but_text=__("intarget_connect") but_target_id="connect_settings"}
            </div>
        </div>
            <p>{__("intarget.help1")}</p>
            <p>{__('intarget.help2')}</p>
            <p>{__('intarget.help3')}</p>
            <p>{__('intarget.help4')}</p>
    </div>

</fieldset>
