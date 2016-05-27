<fieldset>

    <div id="connect_settings">

        <input type="hidden" name="result_ids"
               value="connect_settings,addon_upgrade"/>

        {assign var="intarget_email" value=$intarget_email|default:$user_info.email}
        {assign var="intarget_apikey" value=$intarget_apikey|default:""}

        <div class="control-group">
            <label {if !$intarget_id}class="cm-required cm-email"{/if}
                   for="elm_intarget_email">{__("email")}:</label>

            <div class="controls">
                {if $intarget_id}
                    <div class="twg-text-value">{$intarget_email}</div>
                {else}
                    <input type="text" id="elm_tw_email" name="intarget[email]"
                           value="{$intarget_email}" class="input-text-large" size="60"/>
                {/if}
            </div>
        </div>

        {if !$intarget_id}
            <div class="control-group">
                <label for="elm_intarget_password" class="cm-required">{__("apikey")}:</label>

                <div class="controls">
                    <input type="text" id="elm_intarget_password" name="intarget[apikey]"
                           class="input-text-large" size="32" maxlength="32"  value="{$intarget_apikey}"
                           autocomplete="off"/>
                </div>
            </div>
        {/if}

        <div class="control-group">
            <div class="controls">
                {include file="buttons/button.tpl" but_role="submit" but_meta="btn-primary cm-skip-avail-switch" but_name="dispatch[addons.intarget_connect]" but_text=__("intarget_connect") but_target_id="connect_settings"}
            </div>
        </div>

    </div>

</fieldset>
