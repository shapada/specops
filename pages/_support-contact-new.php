<?php
/*
 * Template Name: TEST Support Contact Page
 */
get_header(); ?>
<?php get_template_part('templates/page', 'banner'); ?>

	<div class="row content-area">

		<div id="content" class="columns-10 column-center site-content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php the_content(); ?>

			<?php endwhile; // end of the loop. ?>

			<div class="formwrap w-www-specopssoft-com p-salesforceform t-salesforcesupportform">
			<form name="aspnetForm" method="post" action="support" onsubmit="javascript:return WebForm_OnSubmit();" id="aspnetForm">
				<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="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" />

			<script type="text/javascript">
			//<![CDATA[
			function WebForm_OnSubmit() {
			if (typeof(ValidatorOnSubmit) == "function" && ValidatorOnSubmit() == false) return false;
			return true;
			}
			//]]>
			</script>

			<div>
				<input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="D2B073FD" />
				<input type="hidden" name="__EVENTTARGET" id="__EVENTTARGET" value="" />
				<input type="hidden" name="__EVENTARGUMENT" id="__EVENTARGUMENT" value="" />
				<input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="/wEWDQKv8O/DBgKwk7XIDQKovLu1DAKU34meDAKOzJHCAgLilczEDAL40ufkBQLKv5/FCwLf9cC8DQLSzd/xBgK8ne3GCgLR2vz7BQKP6p/7A8IeKS0fBakxe1vdyc1S0tJXYHbd" />
			</div>

					<div id="bottomcontent" class="notop container">

						<div class="form-main">
					
							<h1>Submit support request</h1>
								
							<p class="intro">Our dedicated Product Specialist team is always ready to help you when you need it the most. Fill out the fields below and we'll get back to you as quickly as possible.</p>	
								
							<div id="errorMessage">
							    
							</div>

							<div id="formPlaceHolder">
								<div class="row container">
									<div class="col">
									    <label for="productHolder">Product<span id="ctl00_Content_ctl05" class="validator" style="color:Red;visibility:hidden;">*</span>
										</label>
									    <select name="ctl00$Content$productHolder" id="ctl00_Content_productHolder" title="Product" class="select">
											<option selected="selected" value="">Select product</option>
											<option value="Specops Deploy">Specops Deploy</option>
											<option value="Specops Inventory">Specops Inventory</option>
											<option value="Specops Command">Specops Command</option>
											<option value="Specops Password Reset">Specops Password Reset</option>
											<option value="Specops Password Policy">Specops Password Policy</option>
											<option value="Specops Password Sync">Specops Password Sync</option>
											<option value="Specops Self Service Portal">Specops Self Service Portal</option>
											<option value="Specops AD Janitor">Specops AD Janitor</option>
											<option value="Specops Gpupdate Professional">Specops Gpupdate Professional</option>
										</select>
									</div>
				                       				
									<div class="col">
										<label for="typeHolder">Type</label>
										<select name="ctl00$Content$typeHolder" id="ctl00_Content_typeHolder" title="Type" class="select">
											<option selected="selected" value="Question">Question</option>
											<option value="Problem">Problem</option>
											<option value="Feature Request">Feature Request</option>
										</select>
									</div>
								</div>

								<div class="row container">
									<div class="subject">
										<label for="subjectHolder">Subject<span id="ctl00_Content_RExpV7" class="validator" style="color:Red;display:none;">*</span>
										</label>
										<input name="ctl00$Content$subjectHolder" type="text" maxlength="255" id="ctl00_Content_subjectHolder" size="20" class="textfield fullwidth" />
									</div>

									<div>
										<label for="descriptionHolder">Message<span id="ctl00_Content_RExpV6" class="validator" style="color:Red;display:none;">*</span>
										</label>					
										<textarea name="ctl00$Content$descriptionHolder" id="ctl00_Content_descriptionHolder" size="20" maxlength="32000" style="width:430px" rows="8"></textarea>
									</div> 
								</div>     

								<div class="row container">
									<div class="col">
										<label for="firstNameHolder">First name<span id="ctl00_Content_RExpV1" style="color:Red;display:none;">*</span><span id="ctl00_Content_RExpV8" class="validator" style="color:Red;display:none;">*</span>
										</label>
									    <input name="ctl00$Content$firstNameHolder" type="text" maxlength="40" id="ctl00_Content_firstNameHolder" size="20" class="textfield" />
				                    </div>
									<div class="col">
										<label for="lastNameHolder">Last name<span id="ctl00_Content_RExpV2" class="validator" style="color:Red;display:none;">*</span><span id="ctl00_Content_RExpV9" class="validator" style="color:Red;display:none;">*</span>
										</label>
									    <input name="ctl00$Content$lastNameHolder" type="text" maxlength="80" id="ctl00_Content_lastNameHolder" size="20" class="textfield" />
									</div>
								</div>
							    
								<div class="row container">
									<div>
										<label for="emailHolder">E-mail<span id="ctl00_Content_RExpV3" class="validator" style="color:Red;display:none;">*</span><span id="ctl00_Content_RExpV10" class="validator" style="color:Red;display:none;">*</span>
										</label>
										<input name="ctl00$Content$emailHolder" type="text" maxlength="80" id="ctl00_Content_emailHolder" size="20" class="textfield fullwidth" />
									</div>
								</div>
							    
								<div class="row container">
									<div class="col">
										<label for="phoneHolder">Phone (eg +1 234 567 8901)<span id="ctl00_Content_RExpV11" class="validator" style="color:Red;display:none;">*</span>
										</label>
									    <input name="ctl00$Content$phoneHolder" type="text" maxlength="25" id="ctl00_Content_phoneHolder" size="20" class="textfield" />
									</div>				
									<div class="col">
										<label for="companyHolder">Company<span id="ctl00_Content_RExpV5" class="validator" style="color:Red;display:none;">*</span><span id="ctl00_Content_RExpV12" class="validator" style="color:Red;display:none;">*</span>
										</label>
										<input name="ctl00$Content$companyHolder" type="text" maxlength="80" id="ctl00_Content_companyHolder" size="20" class="textfield" />
									</div>	
								</div>

								<input type="button" name="submit" value="Submit" class="button" id="submitbutton" />

							</div><!-- #formPlaceHolder -->
						</div><!-- .form-main -->
					</div><!-- #bottomcontent -->
				<input type="hidden" name="ctl00$Content$Placholders_Visible" id="ctl00_Content_Placholders_Visible" value="True" />

			<script type="text/javascript">
			//<![CDATA[
			var Page_Validators =  new Array(document.getElementById("ctl00_Content_ctl05"), document.getElementById("ctl00_Content_RExpV7"), document.getElementById("ctl00_Content_RExpV6"), document.getElementById("ctl00_Content_RExpV1"), document.getElementById("ctl00_Content_RExpV8"), document.getElementById("ctl00_Content_RExpV2"), document.getElementById("ctl00_Content_RExpV9"), document.getElementById("ctl00_Content_RExpV3"), document.getElementById("ctl00_Content_RExpV10"), document.getElementById("ctl00_Content_RExpV11"), document.getElementById("ctl00_Content_RExpV5"), document.getElementById("ctl00_Content_RExpV12"));
			//]]>
			</script>

			<script type="text/javascript">
			//<![CDATA[
			var ctl00_Content_ctl05 = document.all ? document.all["ctl00_Content_ctl05"] : document.getElementById("ctl00_Content_ctl05");
			ctl00_Content_ctl05.controltovalidate = "ctl00_Content_productHolder";
			ctl00_Content_ctl05.evaluationfunction = "CustomValidatorEvaluateIsValid";
			ctl00_Content_ctl05.clientvalidationfunction = "customValidatorProduct";
			ctl00_Content_ctl05.validateemptytext = "true";
			var ctl00_Content_RExpV7 = document.all ? document.all["ctl00_Content_RExpV7"] : document.getElementById("ctl00_Content_RExpV7");
			ctl00_Content_RExpV7.controltovalidate = "ctl00_Content_subjectHolder";
			ctl00_Content_RExpV7.display = "Dynamic";
			ctl00_Content_RExpV7.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
			ctl00_Content_RExpV7.initialvalue = "";
			var ctl00_Content_RExpV6 = document.all ? document.all["ctl00_Content_RExpV6"] : document.getElementById("ctl00_Content_RExpV6");
			ctl00_Content_RExpV6.controltovalidate = "ctl00_Content_descriptionHolder";
			ctl00_Content_RExpV6.display = "Dynamic";
			ctl00_Content_RExpV6.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
			ctl00_Content_RExpV6.initialvalue = "";
			var ctl00_Content_RExpV1 = document.all ? document.all["ctl00_Content_RExpV1"] : document.getElementById("ctl00_Content_RExpV1");
			ctl00_Content_RExpV1.controltovalidate = "ctl00_Content_firstNameHolder";
			ctl00_Content_RExpV1.display = "Dynamic";
			ctl00_Content_RExpV1.evaluationfunction = "RegularExpressionValidatorEvaluateIsValid";
			ctl00_Content_RExpV1.validationexpression = "[?&\\-\\[\\]\\{\\}\\\\#/><$%!£€@()\':;,._+=0-9a-zA-Z\\xA1-\\xFF\\s]+";
			var ctl00_Content_RExpV8 = document.all ? document.all["ctl00_Content_RExpV8"] : document.getElementById("ctl00_Content_RExpV8");
			ctl00_Content_RExpV8.controltovalidate = "ctl00_Content_firstNameHolder";
			ctl00_Content_RExpV8.display = "Dynamic";
			ctl00_Content_RExpV8.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
			ctl00_Content_RExpV8.initialvalue = "";
			var ctl00_Content_RExpV2 = document.all ? document.all["ctl00_Content_RExpV2"] : document.getElementById("ctl00_Content_RExpV2");
			ctl00_Content_RExpV2.controltovalidate = "ctl00_Content_lastNameHolder";
			ctl00_Content_RExpV2.display = "Dynamic";
			ctl00_Content_RExpV2.evaluationfunction = "RegularExpressionValidatorEvaluateIsValid";
			ctl00_Content_RExpV2.validationexpression = "[?&\\-\\[\\]\\{\\}\\\\#/><$%!£€@()\':;,._+=0-9a-zA-Z\\xA1-\\xFF\\s]+";
			var ctl00_Content_RExpV9 = document.all ? document.all["ctl00_Content_RExpV9"] : document.getElementById("ctl00_Content_RExpV9");
			ctl00_Content_RExpV9.controltovalidate = "ctl00_Content_lastNameHolder";
			ctl00_Content_RExpV9.display = "Dynamic";
			ctl00_Content_RExpV9.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
			ctl00_Content_RExpV9.initialvalue = "";
			var ctl00_Content_RExpV3 = document.all ? document.all["ctl00_Content_RExpV3"] : document.getElementById("ctl00_Content_RExpV3");
			ctl00_Content_RExpV3.controltovalidate = "ctl00_Content_emailHolder";
			ctl00_Content_RExpV3.display = "Dynamic";
			ctl00_Content_RExpV3.evaluationfunction = "RegularExpressionValidatorEvaluateIsValid";
			ctl00_Content_RExpV3.validationexpression = "\\w+([-+.]\\w+)*@\\w+([-.]\\w+)*\\.\\w+([-.]\\w+)*";
			var ctl00_Content_RExpV10 = document.all ? document.all["ctl00_Content_RExpV10"] : document.getElementById("ctl00_Content_RExpV10");
			ctl00_Content_RExpV10.controltovalidate = "ctl00_Content_emailHolder";
			ctl00_Content_RExpV10.display = "Dynamic";
			ctl00_Content_RExpV10.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
			ctl00_Content_RExpV10.initialvalue = "";
			var ctl00_Content_RExpV11 = document.all ? document.all["ctl00_Content_RExpV11"] : document.getElementById("ctl00_Content_RExpV11");
			ctl00_Content_RExpV11.controltovalidate = "ctl00_Content_phoneHolder";
			ctl00_Content_RExpV11.display = "Dynamic";
			ctl00_Content_RExpV11.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
			ctl00_Content_RExpV11.initialvalue = "";
			var ctl00_Content_RExpV5 = document.all ? document.all["ctl00_Content_RExpV5"] : document.getElementById("ctl00_Content_RExpV5");
			ctl00_Content_RExpV5.controltovalidate = "ctl00_Content_companyHolder";
			ctl00_Content_RExpV5.display = "Dynamic";
			ctl00_Content_RExpV5.evaluationfunction = "RegularExpressionValidatorEvaluateIsValid";
			ctl00_Content_RExpV5.validationexpression = "[?&\\-\\[\\]\\{\\}\\\\#/><$%!£€@()\':;,._+=0-9a-zA-Z\\xA1-\\xFF\\s]+";
			var ctl00_Content_RExpV12 = document.all ? document.all["ctl00_Content_RExpV12"] : document.getElementById("ctl00_Content_RExpV12");
			ctl00_Content_RExpV12.controltovalidate = "ctl00_Content_companyHolder";
			ctl00_Content_RExpV12.display = "Dynamic";
			ctl00_Content_RExpV12.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
			ctl00_Content_RExpV12.initialvalue = "";
			//]]>
			</script>

			<script type="text/javascript">
			//<![CDATA[
			var theForm = document.forms['aspnetForm'];
			if (!theForm) {
			    theForm = document.aspnetForm;
			}
			function __doPostBack(eventTarget, eventArgument) {
			    if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
			        theForm.__EVENTTARGET.value = eventTarget;
			        theForm.__EVENTARGUMENT.value = eventArgument;
			        theForm.submit();
			    }
			}
			//]]>
			</script>

			<script type="text/javascript">
			//<![CDATA[

			var Page_ValidationActive = false;
			if (typeof(ValidatorOnLoad) == "function") {
			    ValidatorOnLoad();
			}

			function ValidatorOnSubmit() {
			    if (Page_ValidationActive) {
			        return ValidatorCommonOnSubmit();
			    }
			    else {
			        return true;
			    }
			}
			        //]]>
			</script>
			</form>


			    <script language="javascript">
			      // Set the hidden field retUrl to currentPage and add parameter ”?ViewDownloadUrl=true”
			      function SetUrl(){
			        $("[name=retURL]").val(window.location + "?ViewDownloadUrl=true");
			      }
			        
			      $(document).ready(function() {
			             SetUrl();
			      });

			    </script>
			    
			    <div id="SalesForceForm" >
			        <form id="hiddenForm" action="https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST">
			            <input type=hidden name="oid" value="00D200000000Pcr" />
			            <input id="ret_url" type="hidden" name="retURL" value="" />
			            <input id="firstName" name="first_name" type="hidden" />
			            <input id="lastName" name="last_name" type="hidden" />
			            <input id="subject" name="00ND0000003B4vm" type="hidden" />
			            <input id="email"  name="email"  type="hidden" />
			            <input id="description" name="description" type="hidden" />
			            <input id="00ND0000003B4vh" name="00ND0000003B4vh" type="hidden" />
			            <input id="00ND0000003B4w1" name="00ND0000003B4w1" title="Type" type="hidden" />
			            <input id="00ND0000003B4vI" name="00ND0000003B4vI" type="hidden" value="1" />
			            <input id="phone" name="phone" type="hidden" />
			            <input id="company"  name="company" type="hidden" />
			            <input id="state" name="state" type="hidden" />
			            <input id="lead_source" name="lead_source" type="hidden" value="Company website" />
			            <input name="requestIp" type="hidden" value="96.48.39.103" />
						<input id="00N200000021oE0" name="00N200000021oE0" type="hidden" value="s01067cb21b20ab37.vf.shawcable.net" />			            			
			        </form>
			    </div>

			</div> <!-- .form-wrap -->

		</div><!-- #content -->

	</div>
		
<?php get_footer(); ?>
