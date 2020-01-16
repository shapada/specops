/// <reference path="jquery-1.3.2-vsdoc2.js" />

var litium = function () {
	/// <summary>
	/// General utilities.
	/// </summary>
	//--------------------------------------------------------------------------		
	function initFormDefaultSubmitKeyListener() {
		/// <summary>
		///	http://beardscratchers.com/journal/fixing-the-enter-keypress-event-in-aspnet-with-jquery
		/// </summary>
		/// <param>
		/// </param>
		/// <returns>void</returns>
		var CLASSNAME_PREFIX = 'keysubmit-'; // The prefix of a classname of an input element.
		var classnamePrefixLength = CLASSNAME_PREFIX.length;

		$('fieldset').bind('keypress', function (e) {
			var $parentFieldset;
			var classnames;
			var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;
			var target = e.target.tagName.toLowerCase();

			if (target !== 'input') {
				// Do nothing if the focused element isn't an input or a select element.
				return;
			}

			if (key !== 13) {
				// Do nothing if the key pressed isn't enter/return.
				return;
			}

			e.preventDefault();
			$parentFieldset = $(e.target).parents('fieldset').filter('[class*=' + CLASSNAME_PREFIX + ']').eq(0);

			if ($parentFieldset.length < 1) {
				return;
			}

			classnames = $parentFieldset.attr('class').split(' ');

			for (var i = 0, classname, $buttons, $button; classname = classnames[i]; i++) {
				if (classname.substring(0, classnamePrefixLength) == CLASSNAME_PREFIX) {
					$buttons = $($parentFieldset.find('a.' + classname + ', button.' + classname + ', input.' + classname, $(this)).eq(0));

					if ($buttons.length > 0) {
						$button = $($buttons.get(0));

						if (typeof ($button.onclick) == 'function') {
							// The button has a listener bound to its click event, let's trigger the click.
							$button.trigger('click');
						}
						else if ($button.attr('href')) {
							// The button is an a element with a href attribute, let's go to its url.
							window.self.location = $button.attr('href');
						}
						else {
							// Simulate a click.
							$button.trigger('click');
						}
					}

					break;
				}
			}
		});
	};


	/// <summary>
	/// Submits hidden form in framework
	/// </summary>
	//--------------------------------------------------------------------------
	function submitHiddenForm(values) {

			// copy values to the hidden form.
			//$("#subject").attr("value", $("#subjectHolder").attr("value"));
			//$("#00N20000000lTYi").attr("value", $("#subjectHolder").attr("value"));
			$("#firstName").attr("value", document.getElementById(values.firstName).value);
			$("#lastName").attr("value", document.getElementById(values.lastName).value);
			$("#subject").attr("value", document.getElementById(values.subject).value);
			$("#email").attr("value", document.getElementById(values.email).value);
			$("#company").attr("value", document.getElementById(values.company).value);
			$("#city").attr("value", $("#cityHolder").attr("value"));
			//$("#country").attr("value", $("#countryHolder").attr("value"));
			$("#phone").attr("value", document.getElementById(values.phone).value);
			//$("#state").attr("value", document.getElementById(values.state).value);
			$("#description").attr("value", document.getElementById(values.description).value);
			$("#00ND0000003B4w1").attr("value", document.getElementById(values.type).value);
			//$("#00ND0000003B4zK").attr("value", document.getElementById(location).value);
			$("#00ND0000003B4vh").attr("value", document.getElementById(values.product).value);
			//$("#00ND0000003B4vm").attr("value", document.getElementById(subject).value);

			$("#hiddenForm").submit();
	};

	/// <summary>
	/// SalesForceForm
	/// </summary>
	//--------------------------------------------------------------------------
	function initSalesForceForm(subjectOptionIndex, pl_visible_id) {
		//Select default subject in ddl
		var pl_visible = document.getElementById(pl_visible_id).value;
		if (pl_visible == "True") {
			$("#subjectOption" + subjectOptionIndex)[0].selected = true;
		}
	};

	/// <summary>
	/// Framework
	/// </summary>
	//--------------------------------------------------------------------------
	function initFramework() {

		// Remove separators from items
		$("#headerlinks li:first, #footerlinks li:last").addClass("removeseparator");

		// Initiate top menu
		$('ul.sf-menu').superfish({
			delay: 1000,
			speed: 'fast',
			autoArrows: false,
			dropShadows: false
		});

		// Set focus to searchfield
		$(".searchfield").focus();

		// Initiate colorbox
		$(".modal").colorbox({});
	};

	/// <summary>
	/// Product
	/// </summary>
	//--------------------------------------------------------------------------
	function initProduct() {

		// Initiate tab view
		$("#tabs").tabs();
	};

	/// <summary>
	/// Download
	/// </summary>
	//--------------------------------------------------------------------------
	function initDownload() {

		// Set specific class name to last item
		$("ul.downloadlist li:last").addClass("lastitem");
	};


	//--------------------------------------------------------------------------
	function init() {
		/// <summary>
		///	Initalises the litium class.
		/// </summary>
		initFormDefaultSubmitKeyListener();
		initFramework();
		initProduct();
	};
	//--------------------------------------------------------------------------
	return {
		/// <summary>
		/// Public properties and methods.
		/// </summary>
		init: init,
		initProduct: initProduct,
		initDownload: initDownload,
		initSalesForceForm: initSalesForceForm,
		submitHiddenForm: submitHiddenForm
	};
	//--------------------------------------------------------------------------
} ();

