@extends('admin.index')
@section('content')


<!--main contents start-->
<main class="main-content">
  <div class="page-title"></div>

  <div class="container-fluid">

    <div class="row">
      <div class="col-lg-12">
        <div class="card card-shadow mb-4">
          <div class="card-header">
            <div class="row">
              <div class="col-lg-8 col-8">
                <div class="card-title mt-2">
                  Create Product
                </div>
              </div>
              <div class="col-lg-4 col-4">
                <a href="{{url('manageproduct')}}"  class="btn btn-success text-white btn-sm float-right " style=" border-radius: 0px;">View Product</a>
              </div>
            </div>
          </div>

          <div class="card-body">
            <form method="POST" action="{{url('productinsert')}}" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Code</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product Code" name="product_code" style="border-radius: 0px;">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product Name" name="product_name" style="border-radius: 0px;">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Item Name</label>
                    <select class="form-control" name="item_id" style="border-radius: 0px;">
                      <option>Select Item</option>
                      @if(isset($item))
                      @foreach($item as $itemview)
                      <option value="{{$itemview->id}}">{{$itemview->item_name}}</option>
                      @endforeach
                      @endif
                    </select>
                  </div>
                  
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Purchase Price</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Purchase Price" name="purchase_price" style="border-radius: 0px;">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    <select class="form-control" name="category_id" style="border-radius: 0px;" >
                     <option>Select Item</option>
                      @if(isset($category))
                      @foreach($category as $itemview)
                      <option value="{{$itemview->id}}">{{$itemview->category_name}}</option>
                      @endforeach
                      @endif
                    </select>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Sale price</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Sale price" name="sale_price" style="border-radius: 0px;">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">SubCategory Name</label>
                    <select class="form-control" name="subcategory_id" style="border-radius: 0px;" >
                      <option value="">Select SubCategory</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Discount Price</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Discount Price" name="discount_price" style="border-radius: 0px;" >
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Brand Name</label>
                    <select class="form-control" name="brand_id" style="border-radius: 0px;">
                      <option>Select Item</option>
                      @if(isset($brand))
                      @foreach($brand as $brandview)
                      <option value="{{$brandview->id}}">{{$brandview->brand_name}}</option>
                      @endforeach
                      @endif
                    </select>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Quentity</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Quentity" name="quentity" style="border-radius: 0px;" >
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Short Details</label>
                    <textarea id="summernote" class="form-control" name="short_details"></textarea>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Full Details</label>
                    <textarea id="summernotes" class="form-control" name="full_details"></textarea>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Size</label>
                    <input type="text" data-role="tagsinput" placeholder="Product Size" name="product_size" style="border-radius: 0px;" >
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Product Color</label>
                    <input type="text" data-role="tagsinput" placeholder="Product Color" name="product_color" style="border-radius: 0px;" >
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Measurement Type</label>
                    <select class="form-control" name="measurement_type" style="border-radius: 0px;" >
                      <option value="1">KG</option>
                      <option value="2">DOZZON</option>
                      <option value="3">GRAM</option>
                      <option value="4">PIECE</option>
                      <option value="5">1 BOX</option>
                    </select>
                  </div>
                  
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Stock Status</label>
                    <select class="form-control" name="stock_status" style="border-radius: 0px;" >
                      <option value="1">Stock Available</option>
                      <option value="0">Out of Stock</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                    <select class="form-control" name="status" style="border-radius: 0px;" >
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>
                    </select>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Picture</label>
                    <input id="imgInp" type="file" class="form-control" style="border-radius: 0px;" name="image" style="border-radius: 0px;" multiple>
                    <img id="blah" style="max-height: 50px;">
                  </div>
                </div>
              </div>

              


              <div class="form-group row">
                <div class="col-sm-9 mt-2">
                  <button type="submit" class="btn btn-info btn-sm" style=" border-radius: 0px;">Create Product</button>
                  <button type="reset" class="btn btn-warning btn-sm" style=" border-radius: 0px;">Refresh</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>

</main>
<!--main contents end-->


<script type="text/javascript">
  $(document).ready(function() {
    $('select[name="item_id"]').on('change', function(){
      var item_id = $(this).val();
      if(item_id) {
        $.ajax({
          url: "{{  url('/categoryget/') }}/"+item_id,
          type:"GET",
          dataType:"json",
          success:function(data) {
            var d =$('select[name="category_id"]').empty();
            $.each(data, function(key, value){
              $('select[name="category_id"]').append('<option value="'+ value.id +'">' + value.category_name + '</option>');

            });

          },

        });
      } else {
        alert('danger');
      }

    });
  });

</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('select[name="category_id"]').on('change', function(){
      var category_id = $(this).val();
      if(category_id) {
        $.ajax({
          url: "{{  url('/subcategoryget/') }}/"+category_id,
          type:"GET",
          dataType:"json",
          success:function(data) {
            var d =$('select[name="subcategory_id"]').empty();
            $.each(data, function(key, value){
              $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name + '</option>');

            });

          },

        });
      } else {
        alert('danger');
      }

    });
  });

</script>



<style type="text/css">
  /* bootstrap-tagsinput.css file - add in local */

  .bootstrap-tagsinput {
    border: 1px solid #ccc;
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    display: inline-block;
    padding: 2px 6px;
    color: #fff;
    vertical-align: middle;
    width: 100%;
    line-height: 35px;
    cursor: text;
  }
  .bootstrap-tagsinput input {
    border: none;
    box-shadow: none;
    outline: none;
    background-color: transparent;
    padding: 0 6px;
    margin: 0;
    width: auto;
    max-width: inherit;
  }
  .bootstrap-tagsinput.form-control input::-moz-placeholder {
    color: #777;
    opacity: 1;
  }
  .bootstrap-tagsinput.form-control input:-ms-input-placeholder {
    color: #777;
  }
  .bootstrap-tagsinput.form-control input::-webkit-input-placeholder {
    color: #777;
  }
  .bootstrap-tagsinput input:focus {
    border: none;
    box-shadow: none;
  }
  .bootstrap-tagsinput .tag {
    margin-right: 2px;
    color: #000;
  }
  .bootstrap-tagsinput .tag [data-role="remove"] {
    margin-left: 8px;
    cursor: pointer;
  }
  .bootstrap-tagsinput .tag [data-role="remove"]:after {
    content: "x";
    padding: 0px 2px;
  }
  .bootstrap-tagsinput .tag [data-role="remove"]:hover {
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
  }
  .bootstrap-tagsinput .tag [data-role="remove"]:hover:active {
    box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
  }

</style>


<script type="text/javascript">
  // bootstrap-tagsinput.js file - add in local

  (function ($) {
    "use strict";

    var defaultOptions = {
      tagClass: function(item) {
        return 'label label-info';
      },
      itemValue: function(item) {
        return item ? item.toString() : item;
      },
      itemText: function(item) {
        return this.itemValue(item);
      },
      itemTitle: function(item) {
        return null;
      },
      freeInput: true,
      addOnBlur: true,
      maxTags: undefined,
      maxChars: undefined,
      confirmKeys: [13, 44],
      delimiter: ',',
      delimiterRegex: null,
      cancelConfirmKeysOnEmpty: true,
      onTagExists: function(item, $tag) {
        $tag.hide().fadeIn();
      },
      trimValue: false,
      allowDuplicates: false
    };

  /**
   * Constructor function
   */
   function TagsInput(element, options) {
    this.itemsArray = [];

    this.$element = $(element);
    this.$element.hide();

    this.isSelect = (element.tagName === 'SELECT');
    this.multiple = (this.isSelect && element.hasAttribute('multiple'));
    this.objectItems = options && options.itemValue;
    this.placeholderText = element.hasAttribute('placeholder') ? this.$element.attr('placeholder') : '';
    this.inputSize = Math.max(1, this.placeholderText.length);

    this.$container = $('<div class="bootstrap-tagsinput"></div>');
    this.$input = $('<input type="text" placeholder="' + this.placeholderText + '"/>').appendTo(this.$container);

    this.$element.before(this.$container);

    this.build(options);
  }

  TagsInput.prototype = {
    constructor: TagsInput,

    /**
     * Adds the given item as a new tag. Pass true to dontPushVal to prevent
     * updating the elements val()
     */
     add: function(item, dontPushVal, options) {
      var self = this;

      if (self.options.maxTags && self.itemsArray.length >= self.options.maxTags)
        return;

      // Ignore falsey values, except false
      if (item !== false && !item)
        return;

      // Trim value
      if (typeof item === "string" && self.options.trimValue) {
        item = $.trim(item);
      }

      // Throw an error when trying to add an object while the itemValue option was not set
      if (typeof item === "object" && !self.objectItems)
        throw("Can't add objects when itemValue option is not set");

      // Ignore strings only containg whitespace
      if (item.toString().match(/^\s*$/))
        return;

      // If SELECT but not multiple, remove current tag
      if (self.isSelect && !self.multiple && self.itemsArray.length > 0)
        self.remove(self.itemsArray[0]);

      if (typeof item === "string" && this.$element[0].tagName === 'INPUT') {
        var delimiter = (self.options.delimiterRegex) ? self.options.delimiterRegex : self.options.delimiter;
        var items = item.split(delimiter);
        if (items.length > 1) {
          for (var i = 0; i < items.length; i++) {
            this.add(items[i], true);
          }

          if (!dontPushVal)
            self.pushVal();
          return;
        }
      }

      var itemValue = self.options.itemValue(item),
      itemText = self.options.itemText(item),
      tagClass = self.options.tagClass(item),
      itemTitle = self.options.itemTitle(item);

      // Ignore items allready added
      var existing = $.grep(self.itemsArray, function(item) { return self.options.itemValue(item) === itemValue; } )[0];
      if (existing && !self.options.allowDuplicates) {
        // Invoke onTagExists
        if (self.options.onTagExists) {
          var $existingTag = $(".tag", self.$container).filter(function() { return $(this).data("item") === existing; });
          self.options.onTagExists(item, $existingTag);
        }
        return;
      }

      // if length greater than limit
      if (self.items().toString().length + item.length + 1 > self.options.maxInputLength)
        return;

      // raise beforeItemAdd arg
      var beforeItemAddEvent = $.Event('beforeItemAdd', { item: item, cancel: false, options: options});
      self.$element.trigger(beforeItemAddEvent);
      if (beforeItemAddEvent.cancel)
        return;

      // register item in internal array and map
      self.itemsArray.push(item);

      // add a tag element

      var $tag = $('<span class="tag ' + htmlEncode(tagClass) + (itemTitle !== null ? ('" title="' + itemTitle) : '') + '">' + htmlEncode(itemText) + '<span data-role="remove"></span></span>');
      $tag.data('item', item);
      self.findInputWrapper().before($tag);
      $tag.after(' ');

      // add <option /> if item represents a value not present in one of the <select />'s options
      if (self.isSelect && !$('option[value="' + encodeURIComponent(itemValue) + '"]',self.$element)[0]) {
        var $option = $('<option selected>' + htmlEncode(itemText) + '</option>');
        $option.data('item', item);
        $option.attr('value', itemValue);
        self.$element.append($option);
      }

      if (!dontPushVal)
        self.pushVal();

      // Add class when reached maxTags
      if (self.options.maxTags === self.itemsArray.length || self.items().toString().length === self.options.maxInputLength)
        self.$container.addClass('bootstrap-tagsinput-max');

      self.$element.trigger($.Event('itemAdded', { item: item, options: options }));
    },

    /**
     * Removes the given item. Pass true to dontPushVal to prevent updating the
     * elements val()
     */
     remove: function(item, dontPushVal, options) {
      var self = this;

      if (self.objectItems) {
        if (typeof item === "object")
          item = $.grep(self.itemsArray, function(other) { return self.options.itemValue(other) ==  self.options.itemValue(item); } );
        else
          item = $.grep(self.itemsArray, function(other) { return self.options.itemValue(other) ==  item; } );

        item = item[item.length-1];
      }

      if (item) {
        var beforeItemRemoveEvent = $.Event('beforeItemRemove', { item: item, cancel: false, options: options });
        self.$element.trigger(beforeItemRemoveEvent);
        if (beforeItemRemoveEvent.cancel)
          return;

        $('.tag', self.$container).filter(function() { return $(this).data('item') === item; }).remove();
        $('option', self.$element).filter(function() { return $(this).data('item') === item; }).remove();
        if($.inArray(item, self.itemsArray) !== -1)
          self.itemsArray.splice($.inArray(item, self.itemsArray), 1);
      }

      if (!dontPushVal)
        self.pushVal();

      // Remove class when reached maxTags
      if (self.options.maxTags > self.itemsArray.length)
        self.$container.removeClass('bootstrap-tagsinput-max');

      self.$element.trigger($.Event('itemRemoved',  { item: item, options: options }));
    },

    /**
     * Removes all items
     */
     removeAll: function() {
      var self = this;

      $('.tag', self.$container).remove();
      $('option', self.$element).remove();

      while(self.itemsArray.length > 0)
        self.itemsArray.pop();

      self.pushVal();
    },

    /**
     * Refreshes the tags so they match the text/value of their corresponding
     * item.
     */
     refresh: function() {
      var self = this;
      $('.tag', self.$container).each(function() {
        var $tag = $(this),
        item = $tag.data('item'),
        itemValue = self.options.itemValue(item),
        itemText = self.options.itemText(item),
        tagClass = self.options.tagClass(item);

          // Update tag's class and inner text
          $tag.attr('class', null);
          $tag.addClass('tag ' + htmlEncode(tagClass));
          $tag.contents().filter(function() {
            return this.nodeType == 3;
          })[0].nodeValue = htmlEncode(itemText);

          if (self.isSelect) {
            var option = $('option', self.$element).filter(function() { return $(this).data('item') === item; });
            option.attr('value', itemValue);
          }
        });
    },

    /**
     * Returns the items added as tags
     */
     items: function() {
      return this.itemsArray;
    },

    /**
     * Assembly value by retrieving the value of each item, and set it on the
     * element.
     */
     pushVal: function() {
      var self = this,
      val = $.map(self.items(), function(item) {
        return self.options.itemValue(item).toString();
      });

      self.$element.val(val, true).trigger('change');
    },

    /**
     * Initializes the tags input behaviour on the element
     */
     build: function(options) {
      var self = this;

      self.options = $.extend({}, defaultOptions, options);
      // When itemValue is set, freeInput should always be false
      if (self.objectItems)
        self.options.freeInput = false;

      makeOptionItemFunction(self.options, 'itemValue');
      makeOptionItemFunction(self.options, 'itemText');
      makeOptionFunction(self.options, 'tagClass');

      // Typeahead Bootstrap version 2.3.2
      if (self.options.typeahead) {
        var typeahead = self.options.typeahead || {};

        makeOptionFunction(typeahead, 'source');

        self.$input.typeahead($.extend({}, typeahead, {
          source: function (query, process) {
            function processItems(items) {
              var texts = [];

              for (var i = 0; i < items.length; i++) {
                var text = self.options.itemText(items[i]);
                map[text] = items[i];
                texts.push(text);
              }
              process(texts);
            }

            this.map = {};
            var map = this.map,
            data = typeahead.source(query);

            if ($.isFunction(data.success)) {
              // support for Angular callbacks
              data.success(processItems);
            } else if ($.isFunction(data.then)) {
              // support for Angular promises
              data.then(processItems);
            } else {
              // support for functions and jquery promises
              $.when(data)
              .then(processItems);
            }
          },
          updater: function (text) {
            self.add(this.map[text]);
            return this.map[text];
          },
          matcher: function (text) {
            return (text.toLowerCase().indexOf(this.query.trim().toLowerCase()) !== -1);
          },
          sorter: function (texts) {
            return texts.sort();
          },
          highlighter: function (text) {
            var regex = new RegExp( '(' + this.query + ')', 'gi' );
            return text.replace( regex, "<strong>$1</strong>" );
          }
        }));
      }

      // typeahead.js
      if (self.options.typeaheadjs) {
        var typeaheadConfig = null;
        var typeaheadDatasets = {};

          // Determine if main configurations were passed or simply a dataset
          var typeaheadjs = self.options.typeaheadjs;
          if ($.isArray(typeaheadjs)) {
            typeaheadConfig = typeaheadjs[0];
            typeaheadDatasets = typeaheadjs[1];
          } else {
            typeaheadDatasets = typeaheadjs;
          }

          self.$input.typeahead(typeaheadConfig, typeaheadDatasets).on('typeahead:selected', $.proxy(function (obj, datum) {
            if (typeaheadDatasets.valueKey)
              self.add(datum[typeaheadDatasets.valueKey]);
            else
              self.add(datum);
            self.$input.typeahead('val', '');
          }, self));
        }

        self.$container.on('click', $.proxy(function(event) {
          if (! self.$element.attr('disabled')) {
            self.$input.removeAttr('disabled');
          }
          self.$input.focus();
        }, self));

        if (self.options.addOnBlur && self.options.freeInput) {
          self.$input.on('focusout', $.proxy(function(event) {
              // HACK: only process on focusout when no typeahead opened, to
              //       avoid adding the typeahead text as tag
              if ($('.typeahead, .twitter-typeahead', self.$container).length === 0) {
                self.add(self.$input.val());
                self.$input.val('');
              }
            }, self));
        }


        self.$container.on('keydown', 'input', $.proxy(function(event) {
          var $input = $(event.target),
          $inputWrapper = self.findInputWrapper();

          if (self.$element.attr('disabled')) {
            self.$input.attr('disabled', 'disabled');
            return;
          }

          switch (event.which) {
          // BACKSPACE
          case 8:
          if (doGetCaretPosition($input[0]) === 0) {
            var prev = $inputWrapper.prev();
            if (prev.length) {
              self.remove(prev.data('item'));
            }
          }
          break;

          // DELETE
          case 46:
          if (doGetCaretPosition($input[0]) === 0) {
            var next = $inputWrapper.next();
            if (next.length) {
              self.remove(next.data('item'));
            }
          }
          break;

          // LEFT ARROW
          case 37:
            // Try to move the input before the previous tag
            var $prevTag = $inputWrapper.prev();
            if ($input.val().length === 0 && $prevTag[0]) {
              $prevTag.before($inputWrapper);
              $input.focus();
            }
            break;
          // RIGHT ARROW
          case 39:
            // Try to move the input after the next tag
            var $nextTag = $inputWrapper.next();
            if ($input.val().length === 0 && $nextTag[0]) {
              $nextTag.after($inputWrapper);
              $input.focus();
            }
            break;
            default:
             // ignore
           }

        // Reset internal input's size
        var textLength = $input.val().length,
        wordSpace = Math.ceil(textLength / 5),
        size = textLength + wordSpace + 1;
        $input.attr('size', Math.max(this.inputSize, $input.val().length));
      }, self));

        self.$container.on('keypress', 'input', $.proxy(function(event) {
         var $input = $(event.target);

         if (self.$element.attr('disabled')) {
          self.$input.attr('disabled', 'disabled');
          return;
        }

        var text = $input.val(),
        maxLengthReached = self.options.maxChars && text.length >= self.options.maxChars;
        if (self.options.freeInput && (keyCombinationInList(event, self.options.confirmKeys) || maxLengthReached)) {
            // Only attempt to add a tag if there is data in the field
            if (text.length !== 0) {
             self.add(maxLengthReached ? text.substr(0, self.options.maxChars) : text);
             $input.val('');
           }

            // If the field is empty, let the event triggered fire as usual
            if (self.options.cancelConfirmKeysOnEmpty === false) {
             event.preventDefault();
           }
         }

         // Reset internal input's size
         var textLength = $input.val().length,
         wordSpace = Math.ceil(textLength / 5),
         size = textLength + wordSpace + 1;
         $input.attr('size', Math.max(this.inputSize, $input.val().length));
       }, self));

      // Remove icon clicked
      self.$container.on('click', '[data-role=remove]', $.proxy(function(event) {
        if (self.$element.attr('disabled')) {
          return;
        }
        self.remove($(event.target).closest('.tag').data('item'));
      }, self));

      // Only add existing value as tags when using strings as tags
      if (self.options.itemValue === defaultOptions.itemValue) {
        if (self.$element[0].tagName === 'INPUT') {
          self.add(self.$element.val());
        } else {
          $('option', self.$element).each(function() {
            self.add($(this).attr('value'), true);
          });
        }
      }
    },

    /**
     * Removes all tagsinput behaviour and unregsiter all event handlers
     */
     destroy: function() {
      var self = this;

      // Unbind events
      self.$container.off('keypress', 'input');
      self.$container.off('click', '[role=remove]');

      self.$container.remove();
      self.$element.removeData('tagsinput');
      self.$element.show();
    },

    /**
     * Sets focus on the tagsinput
     */
     focus: function() {
      this.$input.focus();
    },

    /**
     * Returns the internal input element
     */
     input: function() {
      return this.$input;
    },

    /**
     * Returns the element which is wrapped around the internal input. This
     * is normally the $container, but typeahead.js moves the $input element.
     */
     findInputWrapper: function() {
      var elt = this.$input[0],
      container = this.$container[0];
      while(elt && elt.parentNode !== container)
        elt = elt.parentNode;

      return $(elt);
    }
  };

  /**
   * Register JQuery plugin
   */
   $.fn.tagsinput = function(arg1, arg2, arg3) {
    var results = [];

    this.each(function() {
      var tagsinput = $(this).data('tagsinput');
      // Initialize a new tags input
      if (!tagsinput) {
        tagsinput = new TagsInput(this, arg1);
        $(this).data('tagsinput', tagsinput);
        results.push(tagsinput);

        if (this.tagName === 'SELECT') {
          $('option', $(this)).attr('selected', 'selected');
        }

          // Init tags from $(this).val()
          $(this).val($(this).val());
        } else if (!arg1 && !arg2) {
          // tagsinput already exists
          // no function, trying to init
          results.push(tagsinput);
        } else if(tagsinput[arg1] !== undefined) {
          // Invoke function on existing tags input
          if(tagsinput[arg1].length === 3 && arg3 !== undefined){
           var retVal = tagsinput[arg1](arg2, null, arg3);
         }else{
           var retVal = tagsinput[arg1](arg2);
         }
         if (retVal !== undefined)
          results.push(retVal);
      }
    });

    if ( typeof arg1 == 'string') {
      // Return the results from the invoked function calls
      return results.length > 1 ? results : results[0];
    } else {
      return results;
    }
  };

  $.fn.tagsinput.Constructor = TagsInput;

  /**
   * Most options support both a string or number as well as a function as
   * option value. This function makes sure that the option with the given
   * key in the given options is wrapped in a function
   */
   function makeOptionItemFunction(options, key) {
    if (typeof options[key] !== 'function') {
      var propertyName = options[key];
      options[key] = function(item) { return item[propertyName]; };
    }
  }
  function makeOptionFunction(options, key) {
    if (typeof options[key] !== 'function') {
      var value = options[key];
      options[key] = function() { return value; };
    }
  }
  /**
   * HtmlEncodes the given value
   */
   var htmlEncodeContainer = $('<div />');
   function htmlEncode(value) {
    if (value) {
      return htmlEncodeContainer.text(value).html();
    } else {
      return '';
    }
  }

  /**
   * Returns the position of the caret in the given input field
   * http://flightschool.acylt.com/devnotes/caret-position-woes/
   */
   function doGetCaretPosition(oField) {
    var iCaretPos = 0;
    if (document.selection) {
      oField.focus ();
      var oSel = document.selection.createRange();
      oSel.moveStart ('character', -oField.value.length);
      iCaretPos = oSel.text.length;
    } else if (oField.selectionStart || oField.selectionStart == '0') {
      iCaretPos = oField.selectionStart;
    }
    return (iCaretPos);
  }

  /**
    * Returns boolean indicates whether user has pressed an expected key combination.
    * @param object keyPressEvent: JavaScript event object, refer
    *     http://www.w3.org/TR/2003/WD-DOM-Level-3-Events-20030331/ecma-script-binding.html
    * @param object lookupList: expected key combinations, as in:
    *     [13, {which: 188, shiftKey: true}]
    */
    function keyCombinationInList(keyPressEvent, lookupList) {
      var found = false;
      $.each(lookupList, function (index, keyCombination) {
        if (typeof (keyCombination) === 'number' && keyPressEvent.which === keyCombination) {
          found = true;
          return false;
        }

        if (keyPressEvent.which === keyCombination.which) {
          var alt = !keyCombination.hasOwnProperty('altKey') || keyPressEvent.altKey === keyCombination.altKey,
          shift = !keyCombination.hasOwnProperty('shiftKey') || keyPressEvent.shiftKey === keyCombination.shiftKey,
          ctrl = !keyCombination.hasOwnProperty('ctrlKey') || keyPressEvent.ctrlKey === keyCombination.ctrlKey;
          if (alt && shift && ctrl) {
            found = true;
            return false;
          }
        }
      });

      return found;
    }

  /**
   * Initialize tagsinput behaviour on inputs and selects which have
   * data-role=tagsinput
   */
   $(function() {
    $("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput();
  });
 })(window.jQuery);

</script>


@endsection