/**
 * @license Highcharts JS v6.1.0 (2018-04-13)
 * Annotations module
 *
 * (c) 2009-2017 Torstein Honsi
 *
 * License: www.highcharts.com/license
 */
'use strict';
(function (factory) {
	if (typeof module === 'object' && module.exports) {
		module.exports = factory;
	} else {
		factory(Highcharts);
	}
}(function (Highcharts) {
	(function (H) {
		/**
		 * (c) 2009-2017 Highsoft, Black Label
		 *
		 * License: www.highcharts.com/license
		 */

		var    merge = H.merge,
		    addEvent = H.addEvent,
		    extend = H.extend,
		    each = H.each,
		    isString = H.isString,
		    isNumber = H.isNumber,
		    defined = H.defined,
		    isObject = H.isObject,
		    inArray = H.inArray,
		    erase = H.erase,
		    find = H.find,
		    format = H.format,
		    pick = H.pick,
		    objectEach = H.objectEach,
		    uniqueKey = H.uniqueKey,
		    doc = H.doc,
		    splat = H.splat,
		    destroyObjectProperties = H.destroyObjectProperties,
		    grep = H.grep,

		    tooltipPrototype = H.Tooltip.prototype,
		    seriesPrototype = H.Series.prototype,
		    chartPrototype = H.Chart.prototype;


		/* ***************************************************************************
		*
		* MARKER SECTION
		* Contains objects and functions for adding a marker element to a path element
		*
		**************************************************************************** */

		/**
		 * Options for configuring markers for annotations.
		 *
		 * An example of the arrow marker:
		 * <pre>
		 * {
		 *   arrow: {
		 *     id: 'arrow',
		 *     tagName: 'marker',
		 *     refY: 5,
		 *     refX: 5,
		 *     markerWidth: 10,
		 *     markerHeight: 10,
		 *     children: [{
		 *       tagName: 'path',
		 *       attrs: {
		 *         d: 'M 0 0 L 10 5 L 0 10 Z',
		 *         strokeWidth: 0
		 *       }
		 *     }]
		 *   }
		 * }
		 * </pre>
		 * @type {Object}
		 * @sample highcharts/annotations/custom-markers/
		 *         Define a custom marker for annotations
		 * @sample highcharts/css/annotations-markers/
		 *         Define markers in a styled mode
		 * @since 6.0.0
		 * @apioption defs
		 */
		var defaultMarkers = {
		    arrow: {
		        tagName: 'marker',
		        render: false,
		        id: 'arrow',
		        refY: 5,
		        refX: 5,
		        markerWidth: 10,
		        markerHeight: 10,
		        children: [{
		            tagName: 'path',
		            d: 'M 0 0 L 10 5 L 0 10 Z', // triangle (used as an arrow)
            
		        }]
		    }
		};

		var MarkerMixin = {
		    markerSetter: function (markerType) {
		        return function (value) {
		            this.attr(markerType, 'url(#' + value + ')');
		        };
		    }
		};

		extend(MarkerMixin, {
		    markerEndSetter: MarkerMixin.markerSetter('marker-end'),
		    markerStartSetter: MarkerMixin.markerSetter('marker-start')
		});



		H.SVGRenderer.prototype.addMarker = function (id, markerOptions) {
		    var options = { id: id };

    

		    var marker = this.definition(merge({
		        markerWidth: 20,
		        markerHeight: 20,
		        refX: 0,
		        refY: 0,
		        orient: 'auto'
		    }, markerOptions, options));

		    marker.id = id;

		    return marker;
		};


		/* ***************************************************************************
		*
		* MOCK POINT
		*
		**************************************************************************** */

		/**
		 * A mock point configuration.
		 *
		 * @typedef {Object} MockPointOptions
		 * @property {Number} x - x value for the point in xAxis scale or pixels
		 * @property {Number} y - y value for the point in yAxis scale or pixels
		 * @property {String|Number} [xAxis] - xAxis index or id
		 * @property {String|Number} [yAxis] - yAxis index or id
		 */


		/**
		 * A trimmed point object which imitates {@link Highchart.Point} class.
		 * It is created when there is a need of pointing to some chart's position
		 * using axis values or pixel values
		 *
		 * @class MockPoint
		 * @memberOf Highcharts
		 * @private
		 *
		 * @param {Highcharts.Chart} - the chart object
		 * @param {MockPointOptions} - the options object
		 */
		var MockPoint = H.MockPoint = function (chart, options) {
		    this.mock = true;
		    this.series = {
		        visible: true,
		        chart: chart,
		        getPlotBox: seriesPrototype.getPlotBox
		    };

		    // this.plotX
		    // this.plotY

		    /* Those might not exist if a specific axis was not found/defined */
		    // this.x?
		    // this.y?

		    this.init(chart, options);
		};

		/**
		 * A factory function for creating a mock point object
		 *
		 * @function #mockPoint
		 * @memberOf Highcharts
		 *
		 * @param {MockPointOptions} mockPointOptions
		 * @return {MockPoint} a mock point
		 */
		var mockPoint = H.mockPoint = function (chart, mockPointOptions) {
		    return new MockPoint(chart, mockPointOptions);
		};

		MockPoint.prototype = {
		    /**
		     * Initialisation of the mock point
		     *
		     * @function init
		     * @memberOf Highcharts.MockPoint#
		     *
		     * @param {Highcharts.Chart} chart - a chart object to which the mock point
		     * is attached
		     * @param {MockPointOptions} options - a config for the mock point
		     */
		    init: function (chart, options) {
		        var xAxisId = options.xAxis,
		            xAxis = defined(xAxisId) ?
		                chart.xAxis[xAxisId] || chart.get(xAxisId) :
		                null,

		            yAxisId = options.yAxis,
		            yAxis = defined(yAxisId) ?
		                chart.yAxis[yAxisId] || chart.get(yAxisId) :
		                null;


		        if (xAxis) {
		            this.x = options.x;
		            this.series.xAxis = xAxis;
		        } else {
		            this.plotX = options.x;
		        }

		        if (yAxis) {
		            this.y = options.y;
		            this.series.yAxis = yAxis;
		        } else {
		            this.plotY = options.y;
		        }
		    },

		    /**
		     * Update of the point's coordinates (plotX/plotY)
		     *
		     * @function translate
		     * @memberOf Highcharts.MockPoint#
		     *
		     * @return {undefined}
		     */
		    translate: function () {
		        var series = this.series,
		            xAxis = series.xAxis,
		            yAxis = series.yAxis;

		        if (xAxis) {
		            this.plotX = xAxis.toPixels(this.x, true);
		        }

		        if (yAxis) {
		            this.plotY = yAxis.toPixels(this.y, true);
		        }

		        this.isInside = this.isInsidePane();
		    },

		    /**
		     * Returns a box to which an item can be aligned to
		     *
		     * @function #alignToBox
		     * @memberOf Highcharts.MockPoint#
		     *
		     * @param {Boolean} [forceTranslate=false] - whether to update the point's
		     * coordinates
		     * @return {Array.<Number>} A quadruple of numbers which denotes x, y,
		     * width and height of the box
		    **/
		    alignToBox: function (forceTranslate) {
		        if (forceTranslate) {
		            this.translate();
		        }

		        var x = this.plotX,
		            y = this.plotY,
		            temp;


		        if (this.series.chart.inverted) {
		            temp = x;
		            x = y;
		            y = temp;
		        }

		        return [x, y, 0, 0];
		    },

		    /**
		     * Returns a label config object -
		     * the same as Highcharts.Point.prototype.getLabelConfig
		     *
		     * @function getLabelConfig
		     * @memberOf Highcharts.MockPoint#
		     *
		     * @return {Object} labelConfig - label config object
		     * @return {Number|undefined} labelConfig.x
		     *         X value translated to x axis scale
		     * @return {Number|undefined} labelConfig.y
		     *         Y value translated to y axis scale
		     * @return {MockPoint} labelConfig.point
		     *         The instance of the point
		     */
		    getLabelConfig: function () {
		        return {
		            x: this.x,
		            y: this.y,
		            point: this
		        };
		    },

		    isInsidePane: function () {
		        var    plotX = this.plotX,
		            plotY = this.plotY,
		            xAxis = this.series.xAxis,
		            yAxis = this.series.yAxis,
		            isInside = true;

		        if (xAxis) {
		            isInside = defined(plotX) && plotX >= 0 && plotX <= xAxis.len;
		        }

		        if (yAxis) {
		            isInside =
		                isInside &&
		                defined(plotY) &&
		                plotY >= 0 && plotY <= yAxis.len;
		        }

		        return isInside;
		    }
		};


		/* ***************************************************************************
		*
		* ANNOTATION
		*
		**************************************************************************** */

		H.defaultOptions.annotations = [];

		/**
		 * An annotation class which serves as a container for items like labels or
		 * shapes. Created items are positioned on the chart either by linking them to
		 * existing points or created mock points
		 *
		 * @class Annotation
		 * @memberOf Highcharts
		 *
		 * @param {Chart} - the chart object
		 * @param {AnnotationOptions} - the options object
		 */
		var Annotation = H.Annotation = function (chart, userOptions) {

		    /**
		     * The chart that the annotation belongs to.
		     *
		     * @name chart
		     * @memberOf Highcharts.Annotation#
		     * @type {Chart}
		     */
		    this.chart = chart;

		    /**
		     * The array of labels which belong to the annotation.
		     *
		     * @name labels
		     * @memberOf Highcharts.Annotation#
		     * @type {Array<Highcharts.SVGElement>}
		     */
		    this.labels = [];

		    /**
		     * The array of shapes which belong to the annotation.
		     *
		     * @name shapes
		     * @memberOf Highcharts.Annotation#
		     * @type {Array<Highcharts.SVGElement>}
		     */
		    this.shapes = [];

		    /**
		     * The options for the annotations. It containers user defined options
		     * merged with the default options.
		     *
		     * @name options
		     * @memberOf Highcharts.Annotation#
		     * @type {AnnotationOptions}
		     */
		    this.options = merge(this.defaultOptions, userOptions);

		    /**
		     * The callback that reports to the overlapping-labels module which
		     * labels it should account for.
		     *
		     * @name labelCollector
		     * @memberOf Highcharts.Annotation#
		     * @type {Function}
		     * @private
		     */

		    /**
		     * The group element of the annotation.
		     *
		     * @name group
		     * @memberOf Highcharts.Annotation#
		     * @type {Highcharts.SVGElement}
		     * @private
		     */

		    /**
		     * The group element of the annotation's shapes.
		     *
		     * @name shapesGroup
		     * @memberOf Highcharts.Annotation#
		     * @type {Highcharts.SVGElement}
		     * @private
		     */

		    /**
		     * The group element of the annotation's labels.
		     *
		     * @name labelsGroup
		     * @memberOf Highcharts.Annotation#
		     * @type {Highcharts.SVGElement}
		     * @private
		     */

		    this.init(chart, userOptions);
		};

		Annotation.prototype = /** @lends Highcharts.Annotation# */ {
		    /**
		     * Shapes which do not have background - the object is used for proper
		     * setting of the contrast color
		     *
		     * @type {Array.<String>}
		     * @private
		     */
		    shapesWithoutBackground: ['connector'],

		    /**
		     * A map object which allows to map options attributes to element
		     * attributes.
		     *
		     * @type {Object}
		     * @private
		     */
		    attrsMap: {
        
		        zIndex: 'zIndex',
		        width: 'width',
		        height: 'height',
		        borderRadius: 'r',
		        r: 'r',
		        padding: 'padding'
		    },

		    /**
		     * Options for configuring annotations, for example labels, arrows or
		     * shapes. Annotations can be tied to points, axis coordinates or chart
		     * pixel coordinates.
		     *
		     * @private
		     * @type {Array<Object>}
		     * @sample highcharts/annotations/basic/
		     *         Basic annotations
		     * @sample highcharts/demo/annotations/
		     *         Advanced annotations
		     * @sample highcharts/css/annotations
		     *         Styled mode
		     * @sample {highstock} stock/annotations/fibonacci-retracements
		     *         Custom annotation, Fibonacci retracement
		     * @since 6.0.0
		     * @optionparent annotations
		     */
		    defaultOptions: {

		        /**
		         * Whether the annotation is visible.
		         *
		         * @sample highcharts/annotations/visible/
		         *         Set annotation visibility
		         */
		        visible: true,

		        /**
		         * Options for annotation's labels. Each label inherits options
		         * from the labelOptions object. An option from the labelOptions can be
		         * overwritten by config for a specific label.
		         */
		        labelOptions: {

		            /**
		             * The alignment of the annotation's label. If right,
		             * the right side of the label should be touching the point.
		             *
		             * @validvalue ["left", "center", "right"]
		             * @sample highcharts/annotations/label-position/
		             *         Set labels position
		             */
		            align: 'center',

		            /**
		             * Whether to allow the annotation's labels to overlap.
		             * To make the labels less sensitive for overlapping,
		             * the can be set to 0.
		             *
		             * @sample highcharts/annotations/tooltip-like/
		             *         Hide overlapping labels
		             */
		            allowOverlap: false,

		            /**
		             * The background color or gradient for the annotation's label.
		             *
		             * @type {Color}
		             * @sample highcharts/annotations/label-presentation/
		             *         Set labels graphic options
		             */
		            backgroundColor: 'rgba(0, 0, 0, 0.75)',

		            /**
		             * The border color for the annotation's label.
		             *
		             * @type {Color}
		             * @sample highcharts/annotations/label-presentation/
		             *         Set labels graphic options
		             */
		            borderColor: 'black',

		            /**
		             * The border radius in pixels for the annotaiton's label.
		             *
		             * @sample highcharts/annotations/label-presentation/
		             *         Set labels graphic options
		             */
		            borderRadius: 3,

		            /**
		             * The border width in pixels for the annotation's label
		             *
		             * @sample highcharts/annotations/label-presentation/
		             *         Set labels graphic options
		             */
		            borderWidth: 1,

		            /**
		             * A class name for styling by CSS.
		             *
		             * @sample highcharts/css/annotations
		             *         Styled mode annotations
		             * @since 6.0.5
		             */
		            className: '',

		            /**
		             * Whether to hide the annotation's label that is outside the plot
		             * area.
		             *
		             * @sample highcharts/annotations/label-crop-overflow/
		             *         Crop or justify labels
		             */
		            crop: false,

		            /**
		             * The label's pixel distance from the point.
		             *
		             * @type {Number}
		             * @sample highcharts/annotations/label-position/
		             *         Set labels position
		             * @default undefined
		             * @apioption annotations.labelOptions.distance
		             */

		            /**
		             * A [format](https://www.highcharts.com/docs/chart-concepts/labels-and-string-formatting) string for the data label.
		             *
		             * @type {String}
		             * @see    [plotOptions.series.dataLabels.format](
		             *         plotOptions.series.dataLabels.format.html)
		             * @sample highcharts/annotations/label-text/
		             *         Set labels text
		             * @default undefined
		             * @apioption annotations.labelOptions.format
		             */

		            /**
		     