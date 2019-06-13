

var canvas;

var tshirts = new Array();
var alertflip = 0;
var a;
var b;
var form;
var line1;
var line2;
var line3;
var line4;
var imgObj = new Image();

$(document).ready(function () {
	var canvas = new fabric.Canvas('canvas');
	loadFirstProduct(canvas);

	setTimeout(() => {
		{
			canvas.setWidth($("#canvas-area").width());
			canvas.setHeight($("#canvas-area").height());
		}
	}, 200);

	canvas.on({
		'object:moving': function (e) {
			e.target.opacity = 0.5;
		},
		'object:modified': function (e) {
			e.target.opacity = 1;
		},
		'selection:created': onObjectSelected,
		'selection:cleared': onSelectedCleared,
		'touch:gesture': function () {

		},
		'touch:drag': function () {

		},
		'touch:orientation': function () {

		},
		'touch:shake': function () {

		},
		'touch:longpress': function () {

		}

	});
	canvas.findTarget = (function (originalFn) {
		return function () {
			var target = originalFn.apply(this, arguments);
			if (target) {
				if (this._hoveredTarget !== target) {
					canvas.fire('object:over', { target: target });
					if (this._hoveredTarget) {
						canvas.fire('object:out', { target: this._hoveredTarget });
					}
					this._hoveredTarget = target;
				}
			}
			else if (this._hoveredTarget) {
				canvas.fire('object:out', { target: this._hoveredTarget });
				this._hoveredTarget = null;
			}
			return target;
		};
	})(canvas.findTarget);

	canvas.on('object:over', function (e) {
		//e.target.setFill('red');
		//canvas.renderAll();
	});

	canvas.on('object:out', function (e) {
		//e.target.setFill('green');
		//canvas.renderAll();
	});

	$("#text-string").keypress(function (e) {
		if (e.key == "Enter") {
			addText(canvas)
		}
	});
	$("#add-text").click(function () {
		addText(canvas)
	});

	$(".img-polaroid").click(function (e) {
		var el = e.target;
		fabric.Image.fromURL(el.src, function (image) {
			image.set({
				angle: 0,
				padding: 10,
				cornersize: 10,
				hasRotatingPoint: true
			});
			image.scale(0.3);
			canvas.centerObject(image);
			//image.scale(getRandomNum(0.1, 0.25)).setCoords();
			canvas.add(image);
		});
	});


	$(document).keypress(function (e) {
		if (e.key == "Delete") {
			var activeObject = canvas.getActiveObject();
			if (activeObject) {
				canvas.remove(activeObject);
			}

		}
	});

	$("#remove-obj").click(function () {
		canvas.getActiveObjects().forEach(function (activeObject) {
			if (activeObject) {
				canvas.remove(activeObject);
			}
		});

	});

	$("#bring-front").click(function () {
		canvas.getActiveObjects().forEach(function (activeObject) {
			if (activeObject) {
				activeObject.bringForward(true);
				canvas.renderAll();
			}
		});
	});
	$("#bring-back").click(function () {
		canvas.getActiveObjects().forEach(function (activeObject) {
			if (activeObject) {
				activeObject.sendBackwards(true);
				canvas.renderAll();
			}
		});
	});
	$("#bold").click(function () {

		canvas.getActiveObjects().forEach(function (activeObject) {

			if (activeObject && activeObject.type === 'textbox') {
				if (activeObject.get("fontWeight") === 'bold') {
					activeObject.fontWeight = 'normal';
				} else {
					activeObject.fontWeight = 'bold';
				}

				canvas.renderAll();
			}
		});
	});

	$("#italic").click(function () {
		canvas.getActiveObjects().forEach(function (activeObject) {

			if (activeObject && activeObject.type === 'textbox') {
				if (activeObject.get("fontStyle") === 'italic') {
					activeObject.fontStyle = 'normal';
				} else {
					activeObject.fontStyle = 'italic';
				}
				canvas.renderAll();
			}
		});
	});

	var x = 0;

	$("#strike").click(function () {

		canvas.getActiveObjects().forEach(function (activeObject) {
			if (activeObject && activeObject.type === 'textbox') {
				activeObject.set("linethrough", !activeObject["linethrough"]);
				canvas.renderAll();
			}
		});
	});

	$("#underline").click(function () {
		canvas.getActiveObjects().forEach(function (activeObject) {
			if (activeObject && activeObject.type === 'textbox') {
				activeObject.set("underline", !activeObject["underline"])
				canvas.renderAll();
			}
		});

	});

	$("#text-left").click(function () {
		var activeObject = canvas.getActiveObject();
		if (activeObject && activeObject.type === 'textbox') {
			activeObject.textAlign = 'left';
			canvas.renderAll();
		}
	});

	$("#text-center").click(function () {
		var activeObject = canvas.getActiveObject();
		if (activeObject && activeObject.type === 'textbox') {
			activeObject.textAlign = 'center';
			canvas.renderAll();
		}
	});

	$("#text-right").click(function () {
		var activeObject = canvas.getActiveObject();
		if (activeObject && activeObject.type === 'textbox') {
			activeObject.textAlign = 'right';
			canvas.renderAll();
		}
	});

	// $('#text-bgcolor').miniColors({
	// 	change: function (hex, rgb) {
	// 		var activeObject = canvas.getActiveObject();
	// 		if (activeObject && activeObject.type === 'textbox') {
	// 			activeObject.backgroundColor = this.value;
	// 			canvas.renderAll();
	// 		}
	// 	},
	// 	open: function (hex, rgb) {
	// 		canvas.renderAll();
	// 	},
	// 	close: function (hex, rgb) {
	// 		canvas.renderAll();
	// 	}
	// });


	//canvas.add(new fabric.fabric.Object({hasBorders:true,hasControls:false,hasRotatingPoint:false,selectable:false,type:'rect'}));
	// $("#drawingArea").hover(
	// 	function () {
	// 		canvas.add(line1);
	// 		canvas.add(line2);
	// 		canvas.add(line3);
	// 		canvas.add(line4);
	// 		canvas.renderAll();
	// 	},
	// 	function () {
	// 		canvas.remove(line1);
	// 		canvas.remove(line2);
	// 		canvas.remove(line3);
	// 		canvas.remove(line4);
	// 		canvas.renderAll();
	// 	}
	// );

	$('#color-picker').on('colorpickerChange', function (event) {

		canvas.getActiveObjects().forEach(function (activeObject) {
			if (activeObject) {
				activeObject.setColor(event.color.toString());
			}
		});
		canvas.renderAll();
	});

	$(".font-selector").click(function () {
		var font = $(this).css('font-family');
		canvas.getActiveObjects().forEach(function (activeObject) {
			if (activeObject && activeObject.type === 'textbox') {
				activeObject.set({ fontFamily: font });
			}
		});
		canvas.renderAll();
		$("#modalSelectFont").modal("hide");
	});

	$(".change-product").click(function () {
		$("#canvas-area").data("width", $(this).data('width'));
		$("#canvas-area").data("height", $(this).data('height'));
		$("#canvas-area").data("top", $(this).data('top'));
		$("#canvas-area").data("left", $(this).data('left'));
		$("#canvas-area").data("img", $(this).data("img"));
		$("#canvas-area").data("flip-img", $(this).data("flip-img"));
		$("#tshirt").attr("src", $("#canvas-area").data("img"));

		loadProduct(canvas);
		$("#modalChooseProduct").modal('hide');
	});

	$(".add-icon").click(function () {
		fabric.loadSVGFromURL($(this).data("img"), function (objects, options) {
			var obj = fabric.util.groupSVGElements(objects, options);
			obj.scale(0.1);
			obj.setColor($("#color-picker").colorpicker("getValue"));
			canvas.add(obj);
			canvas.centerObject(obj);
		});
	});


	$('#fileToUpload').change(function (event) {
		form = new FormData();
		imgObj.src = event.target.result;
		form.append('fileToUpload', event.target.files[0]); // para apenas 1 arquivo
		//var name = event.target.files[0].content.name; // para capturar o nome do arquivo com sua extenção
	});

	$('#btnEnviar').click(function (e) {
		console.log("btn enviar");
		e.preventDefault();
		$.ajax({
			url: 'Uploadds.php', // point to server-side PHP script 
			dataType: 'text',
			cache: false,
			contentType: false,
			processData: false,
			data: form,
			type: 'post',
			success: function (php_script_response) {
				console.log(php_script_response);
				var img = new fabric.Image.fromURL(php_script_response, function (img) {
					img.scale(0.3);
					canvas.centerObject(img);
					canvas.add(img);
				});
			},
			error: function (e) {
				console.log(e);
			}
		});
		$("#modalUploadImg").modal("hide");
	});

	$('.color-preview').click(function () {
		var color = $(this).css("background-color");
		$("#shirtDiv").css('background-color', color);
		$('#modalChooseColor').modal('hide');
	});

	$('#flip').click(function () {
		if (!(alertflip > 0)) {
			$("#alert-flip").css("display", "block");
			alertflip = 1;
		}

		if ($("#tshirt").attr("src").includes("back-")) {
			$("#tshirt").attr("src", $("#canvas-area").data("flip-img").replace("back-", ""));
		} else {
			$("#tshirt").attr("src", $("#canvas-area").data("flip-img"));
		}


		// if ($(this).attr("data-original-title") == "Show Back View") {
		// 	$(this).attr('data-original-title', 'Show Front View');
		// 	$("#tshirtFacing").attr("src", "img/crew_back.png");
		// 	a = JSON.stringify(canvas);
		// 	canvas.clear();
		// 	try {
		// 		var json = JSON.parse(b);
		// 		canvas.loadFromJSON(b);
		// 	}
		// 	catch (e) { }

		// } else {
		// 	$(this).attr('data-original-title', 'Show Back View');
		// 	$("#tshirtFacing").attr("src", "img/crew_front1.png");
		// 	b = JSON.stringify(canvas);
		// 	canvas.clear();
		// 	try {
		// 		var json = JSON.parse(a);
		// 		canvas.loadFromJSON(a);
		// 	}
		// 	catch (e) { }
		// }
		// canvas.renderAll();

	});
	$(".clearfix button,a").tooltip();

	// line1 = new fabric.Line([0, 0, 200, 0], { "stroke": "#000000", "strokeWidth": 1, hasBorders: false, hasControls: false, hasRotatingPoint: false, selectable: false });
	// line2 = new fabric.Line([199, 0, 200, 399], { "stroke": "#000000", "strokeWidth": 1, hasBorders: false, hasControls: false, hasRotatingPoint: false, selectable: false });
	// line3 = new fabric.Line([0, 0, 0, 400], { "stroke": "#000000", "strokeWidth": 1, hasBorders: false, hasControls: false, hasRotatingPoint: false, selectable: false });
	// line4 = new fabric.Line([0, 400, 200, 399], { "stroke": "#000000", "strokeWidth": 1, hasBorders: false, hasControls: false, hasRotatingPoint: false, selectable: false });

	$(window).resize(function () {
		loadProduct(canvas)

	});

});
//DOCUMENT READY




function addText(canvas) {
	var text = $("#text-string").val();
	$("#text-string").val("");
	$('#texto-teste').text(text);
	$('#modalAddText').modal('hide');
	var text = new fabric.Textbox(text,
		{
			fontFamily: 'FontAwesome',
			fontSize: (canvas.getWidth() * 0.30),
			fill: $("#color-picker").colorpicker('getValue')
		});

	canvas.add(text);
	canvas.centerObject(text);
}




function getRandomNum(min, max) {
	return Math.random() * (max - min) + min;
}

function onObjectSelected(e) {

	var selectedObject = e.target;
	selectedObject.hasRotatingPoint = true
	if (selectedObject && selectedObject.type === 'textbox') {
		$('#color-picker').colorpicker("setValue", selectedObject.fill);
		$("#text-commands").css("display", "block");
	}
	else if (selectedObject && selectedObject.type === 'image') {
		$("#texteditor").css('display', 'block');
		$("#imageeditor").css('display', 'block');
	}
}
function onSelectedCleared(e) {
	$("#text-commands").css('display', 'none');
}
function setFont(font) {
	var activeObject = canvas.getActiveObject();
	if (activeObject && activeObject.type === 'textbox') {
		activeObject.fontFamily = font;
		canvas.renderAll();
	}
}
function removeWhite() {
	var activeObject = canvas.getActiveObject();
	if (activeObject && activeObject.type === 'image') {
		activeObject.filters[2] = new fabric.Image.filters.RemoveWhite({ hreshold: 100, distance: 10 });
		activeObject.applyFilters(canvas.renderAll.bind(canvas));
	}
}

function loadFirstProduct(canvas) {
	$("#canvas-area").data("width", "0.40");
	$("#canvas-area").data("height", "0.65");
	$("#canvas-area").data("top", "17%");
	$("#canvas-area").data("left", "29%");
	$("#canvas-area").data("flip-img", "img/mockups/back-tshirtman.png");
	$("#canvas-area").data("img", "img/mockups/tshirtman.png");

	$("#tshirt").attr("src", $("#canvas-area").data("img"));

	loadProduct(canvas);

}
function loadProduct(canvas) {

	setTimeout(function () {
		var width = $("#tshirt").width() * $("#canvas-area").data("width");
		var height = $("#tshirt").height() * $("#canvas-area").data("height");

		$("#canvas-area").css("width", width);
		$("#canvas-area").css("height", height);
		$("#canvas-area").css("top", $("#canvas-area").data("top"));
		$("#canvas-area").css("left", $("#canvas-area").data("left"));

		canvas.setWidth($("#canvas-area").width());
		canvas.setHeight($("#canvas-area").height());
	}, 100)
}