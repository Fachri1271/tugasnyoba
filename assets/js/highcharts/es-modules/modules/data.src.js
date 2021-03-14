/**
 * Data module
 *
 * (c) 2012-2017 Torstein Honsi
 *
 * License: www.highcharts.com/license
 */
'use strict';
import Highcharts from '../parts/Globals.js';
import '../parts/Utilities.js';
import '../parts/Chart.js';
import '../mixins/ajax.js';

// Utilities
var addEvent = Highcharts.addEvent,
    Chart = Highcharts.Chart,
    win = Highcharts.win,
    doc = win.document,
    each = Highcharts.each,
    objectEach = Highcharts.objectEach,
    pick = Highcharts.pick,
    inArray = Highcharts.inArray,
    isNumber = Highcharts.isNumber,
    merge = Highcharts.merge,
    splat = Highcharts.splat,
    fireEvent = Highcharts.fireEvent,
    some = Highcharts.some,
    SeriesBuilder;


/**
 * The Data module provides a simplified interface for adding data to
 * a chart from sources like CVS, HTML tables or grid views. See also
 * the [tutorial article on the Data module](http://www.highcharts.com/docs/working-
 * with-data/data-module).
 *
 * It requires the `modules/data.js` file to be loaded.
 *
 * Please note that the default way of adding data in Highcharts, without
 * the need of a module, is through the [series.data](#series.data)
 * option.
 *
 * @sample {highcharts} highcharts/demo/column-parsed/ HTML table
 * @sample {highcharts} highcharts/data/csv/ CSV
 * @since 4.0
 * @apioption data
 */

/**
 * A callback function to modify the CSV before parsing it. Return the modified
 * string.
 *
 * @type {Function}
 * @sample {highcharts} highcharts/demo/line-ajax/ Modify CSV before parse
 * @since 6.1
 * @apioption data.beforeParse
 */

/**
 * A two-dimensional array representing the input data on tabular form.
 * This input can be used when the data is already parsed, for example
 * from a grid view component. Each cell can be a string or number.
 * If not switchRowsAndColumns is set, the columns are interpreted as
 * series.
 *
 * @type {Array<Array<Mixed>>}
 * @see [data.rows](#data.rows)
 * @sample {highcharts} highcharts/data/columns/ Columns
 * @since 4.0
 * @apioption data.columns
 */

/**
 * The callback that is evaluated when the data is finished loading,
 * optionally from an external source, and parsed. The first argument
 * passed is a finished chart options object, containing the series.
 * These options can be extended with additional options and passed
 * directly to the chart constructor.
 *
 * @type {Function}
 * @see [data.parsed](#data.parsed)
 * @sample {highcharts} highcharts/data/complete/ Modify data on complete
 * @since 4.0
 * @apioption data.complete
 */

/**
 * A comma delimited string to be parsed. Related options are [startRow](
 * #data.startRow), [endRow](#data.endRow), [startColumn](#data.startColumn)
 * and [endColumn](#data.endColumn) to delimit what part of the table
 * is used. The [lineDelimiter](#data.lineDelimiter) and [itemDelimiter](
 * #data.itemDelimiter) options define the CSV delimiter formats.
 *
 * The built-in CSV parser doesn't support all flavours of CSV, so in
 * some cases it may be necessary to use an external CSV parser. See
 * [this example](http://jsfiddle.net/highcharts/u59176h4/) of parsing
 * CSV through the MIT licensed [Papa Parse](http://papaparse.com/)
 * library.
 *
 * @type {String}
 * @sample {highcharts} highcharts/data/csv/ Data from CSV
 * @since 4.0
 * @apioption data.csv
 */

/**
 * Which of the predefined date formats in Date.prototype.dateFormats
 * to use to parse date values. Defaults to a best guess based on what
 * format gives valid and ordered dates.
 *
 * Valid options include:
 *
 * *   `YYYY/mm/dd`
 * *   `dd/mm/YYYY`
 * *   `mm/dd/YYYY`
 * *   `dd/mm/YY`
 * *   `mm/dd/YY`
 *
 * @validvalue [undefined, "YYYY/mm/dd", "dd/mm/YYYY", "mm/dd/YYYY",
 *             "dd/mm/YYYY", "dd/mm/YY", "mm/dd/YY"]
 * @type {String}
 * @see [data.parseDate](#data.parseDate)
 * @sample {highcharts} highcharts/data/dateformat-auto/ Best guess date format
 * @since 4.0
 * @apioption data.dateFormat
 */

/**
 * The decimal point used for parsing numbers in the CSV.
 *
 * If both this and data.delimiter is set to false, the parser will
 * attempt to deduce the decimal point automatically.
 *
 * @type {String}
 * @sample {highcharts} highcharts/data/delimiters/ Comma as decimal point
 * @default .
 * @since 4.1.0
 * @apioption data.decimalPoint
 */

/**
 * In tabular input data, the last column (indexed by 0) to use. Defaults
 * to the last column containing data.
 *
 * @type {Number}
 * @sample {highcharts} highcharts/data/start-end/ Limited data
 * @since 4.0
 * @apioption data.endColumn
 */

/**
 * In tabular input data, the last row (indexed by 0) to use. Defaults
 * to the last row containing data.
 *
 * @type {Number}
 * @sample {highcharts} highcharts/data/start-end/ Limited data
 * @since 4.0.4
 * @apioption data.endRow
 */

/**
 * Whether to use the first row in the data set as series names.
 *
 * @type {Boolean}
 * @sample {highcharts} highcharts/data/start-end/ Don't get series names from the CSV
 * @sample {highstock} highcharts/data/start-end/ Don't get series names from the CSV
 * @default true
 * @since 4.1.0
 * @product highcharts highstock
 * @apioption data.firstRowAsNames
 */

/**
 * The key for a Google Spreadsheet to load. See [general information
 * on GS](https://developers.google.com/gdata/samples/spreadsheet_sample).
 *
 * @type {String}
 * @sample {highcharts} highcharts/data/google-spreadsheet/
 *         Load a Google Spreadsheet
 * @since 4.0
 * @apioption data.googleSpreadsheetKey
 */

/**
 * The Google Spreadsheet worksheet to use in combination with
 * [googleSpreadsheetKey](#data.googleSpreadsheetKey). The available id's from
 * your sheet can be read from `https://spreadsheets.google.com/feeds/worksheets/{key}/public/basic`.
 *
 * @type {String}
 * @sample {highcharts} highcharts/data/google-spreadsheet/ Load a Google Spreadsheet
 * @since 4.0
 * @apioption data.googleSpreadsheetWorksheet
 */

/**
 * Item or cell delimiter for parsing CSV. Defaults to the tab character
 * `\t` if a tab character is found in the CSV string, if not it defaults
 * to `,`.
 *
 * If this is set to false or undefined, the parser will attempt to deduce
 * the delimiter automatically.
 *
 * @type {String}
 * @sample {highcharts} highcharts/data/delimiters/ Delimiters
 * @since 4.0
 * @apioption data.itemDelimiter
 */

/**
 * Line delimiter for parsing CSV.
 *
 * @type {String}
 * @sample {highcharts} highcharts/data/delimiters/ Delimiters
 * @default \n
 * @since 4.0
 * @apioption data.lineDelimiter
 */

/**
 * A callback function to parse string representations of dates into
 * JavaScript timestamps. Should return an integer timestamp on success.
 *
 * @type {Function}
 * @see [dateFormat](#data.dateFormat)
 * @since 4.0
 * @apioption data.parseDate
 */

/**
 * A callback function to access the parsed columns, the two-dimentional
 * input data array directly, before they are interpreted into series
 * data and categories. Return `false` to stop completion, or call
 * `this.complete()` to continue async.
 *
 * @type {Function}
 * @see [data.complete](#data.complete)
 * @sample {highcharts} highcharts/data/parsed/ Modify data after parse
 * @since 4.0
 * @apioption data.parsed
 */

/**
 * The same as the columns input option, but defining rows intead of
 * columns.
 *
 * @type {Array<Array<Mixed>>}
 * @see [data.columns](#data.columns)
 * @sample {highcharts} highcharts/data/rows/ Data in rows
 * @since 4.0
 * @apioption data.rows
 */

/**
 * An array containing object with Point property names along with what
 * column id the property should be taken from.
 *
 * @type {Array<Object>}
 * @sample {highcharts} highcharts/data/seriesmapping-label/ Label from data set
 * @since 4.0.4
 * @apioption data.seriesMapping
 */

/**
 * In tabular input data, the first column (indexed by 0) to use.
 *
 * @type {Number}
 * @sample {highcharts} highcharts/data/start-end/ Limited data
 * @default 0
 * @since 4.0
 * @apioption data.startColumn
 */

/**
 * In tabular input data, the first row (indexed by 0) to use.
 *
 * @type {Number}
 * @sample {highcharts} highcharts/data/start-end/ Limited data
 * @default 0
 * @since 4.0
 * @apioption data.startRow
 */

/**
 * Switch rows and columns of the input data, so that `this.columns`
 * effectively becomes the rows of the data set, and the rows are interpreted
 * as series.
 *
 * @type {Boolean}
 * @sample {highcharts} highcharts/data/switchrowsandcolumns/ Switch rows and columns
 * @default false
 * @since 4.0
 * @apioption data.switchRowsAndColumns
 */

/**
 * A HTML table or the id of such to be parsed as input data. Related
 * options are `startRow`, `endRow`, `startColumn` and `endColumn` to
 * delimit what part of the table is used.
 *
 * @type {String|HTMLElement}
 * @sample {highcharts} highcharts/demo/column-parsed/ Parsed table
 * @since 4.0
 * @apioption data.table
 */

/**
 * A URL to a remote CSV dataset.
 * Will be fetched when the chart is created using Ajax.
 *
 * @type {String}
 * @sample highcharts/data/livedata-columns
 *           Categorized bar chart with CSV and live polling
 * @sample highcharts/data/livedata-csv
 *         Time based line chart with CSV and live polling
 * @apioption data.csvURL
 */

/**
 * A URL to a remote JSON dataset, structured as a row array.
 * Will be fetched when the chart is created using Ajax.
 *
 * @type {String}
 * @sample highcharts/data/livedata-rows
 *         Rows with live polling
 * @apioption data.rowsURL
 */

/**
 * A URL to a remote JSON dataset, structured as a column array.
 * Will be fetched when the chart is created using Ajax.
 *
 * @type {String}
 * @sample highcharts/data/livedata-columns
 *         Columns with live polling
 * @apioption data.columnsURL
 */

/**
 * Sets the refresh rate for data polling when importing remote dataset by
 * setting [data.csvURL](data.csvURL), [data.rowsURL](data.rowsURL),
 * [data.columnsURL](data.columnsURL), or
 * [data.googleSpreadsheetKey](data.googleSpreadsheetKey).
 *
 * Note that polling must be enabled by setting
 * [data.enablePolling](data.enablePolling) to true.
 *
 * The value is the number of seconds between pollings.
 * It cannot be set to less than 1 second.
 *
 * @default 1
 * @type {Number}
 * @sample highcharts/demo/live-data
 *         Live data with user set refresh rate
 * @apioption data.dataRefreshRate
 */

/**
 * Enables automatic refetching of remote datasets every _n_ seconds (defined by
 * setting [data.dataRefreshRate](data.dataRefreshRate)).
 *
 * Only works when either [data.csvURL](data.csvURL),
 * [data.rowsURL](data.rowsURL), [data.columnsURL](data.columnsURL), or
 * [data.googleSpreadsheetKey](data.googleSpreadsheetKey).
 *
 * @sample highcharts/demo/live-data
 *         Live data
 * @sample highcharts/data/livedata-columns
 *           Categorized bar chart with CSV and live polling
 *
 * @type {Bool}
 * @default false
 * @apioption data.enablePolling
 */

// The Data constructor
var Data = function (dataOptions, chartOptions, chart) {
    this.init(dataOptions, chartOptions, chart);
};

// Set the prototype properties
Highcharts.extend(Data.prototype, {

    /**
     * Initialize the Data object with the given options
     */
    init: function (options, chartOptions, chart) {

        var decimalPoint = options.decimalPoint,
            hasData;

        if (chartOptions) {
            this.chartOptions = chartOptions;
        }
        if (chart) {
            this.chart = chart;
        }

        if (decimalPoint !== '.' && decimalPoint !== ',') {
            decimalPoint = undefined;
        }

        this.options = options;
        this.columns = (
            options.columns ||
            this.rowsToColumns(options.rows) ||
            []
        );

        this.firstRowAsNames = pick(
            options.firstRowAsNames,
            this.firstRowAsNames,
            true
        );

        this.decimalRegex = (
            decimalPoint &&
            new RegExp('^(-?[0-9]+)' + decimalPoint + '([0-9]+)$') // eslint-disable-line security/detect-non-literal-regexp
        );

        // This is a two-dimensional array holding the raw, trimmed string
        // values with the same organisation as the columns array. It makes it
        // possible for example to revert from interpreted timestamps to
        // string-based categories.
        this.rawColumns = [];

        // No need to parse or interpret anything
        if (this.columns.length) {
            this.dataFound();
            hasData = true;
        }

        if (!hasData) {
            // Fetch live data
            hasData = this.fetchLiveData();
        }

        if (!hasData) {
            // Parse a CSV string if options.csv is given. The parseCSV function
            // returns a columns array, if it has no length, we have no data
            hasData = Boolean(this.parseCSV().length);
        }

        if (!hasData) {
            // Parse a HTML table if options.table is given
            hasData = Boolean(this.parseTable().length);
        }

        if (!hasData) {
            // Parse a Google Spreadsheet
            hasData = this.parseGoogleSpreadsheet();
        }

        if (!hasData && options.afterComplete) {
            options.afterComplete();
        }
    },

    /**
     * Get the column distribution. For example, a line series takes a single
     * column for Y values. A range series takes two columns for low and high
     * values respectively, and an OHLC series takes four columns.
     */
    getColumnDistribution: function () {
        var chartOptions = this.chartOptions,
            options = this.options,
            xColumns = [],
            getValueCount = function (type) {
                return (
                    Highcharts.seriesTypes[type || 'line'].prototype
                        .pointArrayMap ||
                    [0]
                ).length;
            },
            getPointArrayMap = function (type) {
                return Highcharts.seriesTypes[type || 'line']
                    .prototype.pointArrayMap;
            },
            globalType = (
                chartOptions &&
                chartOptions.chart &&
                chartOptions.chart.type
            ),
            individualCounts = [],
            seriesBuilders = [],
            seriesIndex = 0,
            i;

        each((chartOptions && chartOptions.series) || [], function (series) {
            individualCounts.push(getValueCount(series.type || globalType));
        });

        // Collect the x-column indexes from seriesMapping
        each((options && options.seriesMapping) || [], function (mapping) {
            xColumns.push(mapping.x || 0);
        });

        // If there are no defined series with x-columns, use the first column
        // as x column
        if (xColumns.length === 0) {
            xColumns.push(0);
        }

        // Loop all seriesMappings and constructs SeriesBuilders from
        // the mapping options.
        each((options && options.seriesMapping) || [], function (mapping) {
            var builder = new SeriesBuilder(),
                numberOfValueColumnsNeeded = individualCounts[seriesIndex] ||
                    getValueCount(globalType),
                seriesArr = (chartOptions && chartOptions.series) || [],
                series = seriesArr[seriesIndex] || {},
                pointArrayMap = getPointArrayMap(series.type || globalType) ||
                    ['y'];

            // Add an x reader from the x property or from an undefined column
            // if the property is not set. It will then be auto populated later.
            builder.addColumnReader(mapping.x, 'x');

            // Add all column mappings
            objectEach(mapping, function (val, name) {
                if (name !== 'x') {
                    builder.addColumnReader(val, name);
                }
            });

            // Add missing columns
            for (i = 0; i < numberOfValueColumnsNeeded; i++) {
                if (!builder.hasReader(pointArrayMap[i])) {
                    // Create and add a column reader for the next free column
                    // index
                    builder.addColumnReader(undefined, pointArrayMap[i]);
                }
            }

            seriesBuilders.push(builder);
            seriesIndex++;
        });

        var globalPointArrayMap = getPointArrayMap(globalType);
        if (globalPointArrayMap === undefined) {
            globalPointArrayMap = ['y'];
        }

        this.valueCount = {
            global: getValueCount(globalType),
            xColumns: xColumns,
            individual: individualCounts,
            seriesBuilders: seriesBuilders,
            globalPointArrayMap: globalPointArrayMap
        };
    },

    /**
     * When the data is parsed into columns, either by CSV, table, GS or direct
     * input, continue with other operations.
     */
    dataFound: function () {

        if (this.options.switchRowsAndColumns) {
            this.columns = this.rowsToColumns(this.columns);
        }

        // Interpret the info about series and columns
        this.getColumnDistribution();

        // Interpret the values into right types
        this.parseTypes();

        // Handle columns if a handleColumns callback is given
        if (this.parsed() !== false) {

            // Complete if a complete callback is given
            this.complete();
        }

    },

    /**
     * Parse a CSV input string
     */
    parseCSV: function (inOptions) {
        var self = this,
            options = inOptions || this.options,
            csv = options.csv,
            columns,
            startRow = (
                typeof options.startRow !== 'undefined' && options.startRow ?
                    options.startRow :
                    0
            ),
            endRow = options.endRow || Number.MAX_VALUE,
            startColumn = (
                typeof options.startColumn !== 'undefined' &&
                options.startColumn
            ) ? options.startColumn : 0,
            endColumn = options.endColumn || Number.MAX_VALUE,
            itemDelimiter,
            lines,
            rowIt = 0,
            // activeRowNo = 0,
            dataTypes = [],
            // We count potential delimiters in the prepass, and use the
            // result as the basis of half-intelligent guesses.
            potDelimiters = {
                ',': 0,
                ';': 0,
                '\t': 0
            };

        columns = this.columns = [];

        /*
            This implementation is quite verbose. It will be shortened once
            it's stable and passes all the test.

            It's also not written with speed in mind, instead everything is
            very seggregated, and there a several redundant loops.
            This is to make it easier to stabilize the code initially.

            We do a pre-pass on the first 4 rows to make some intelligent
            guesses on the set. Guessed delimiters are in this pass counted.

            Auto detecting delimiters
                - If we meet a quoted string, the next symbol afterwards
                  (that's not \s, \t) is the delimiter
                - If we meet a date, the next symbol afterwards is the delimiter

            Date formats
                - If we meet a column with date formats, check all of them to
                  see if one of the potential months crossing 12. If it does,
                  we now know the format

            It would make things easier to guess the delimiter before
            doing the actual parsing.

            General rules:
                - Quoting is allowed, e.g: "Col 1",123,321
                - Quoting is optional, e.g.: Col1,123,321
                - Doubble quoting is escaping, e.g. "Col ""Hello world""",123
                - Spaces are considered part of the data: Col1 ,123
                - New line is always the row delimiter
                - Potential column delimiters are , ; \t
                - First row may optionally contain headers
                - The last row may or may not have a row delimiter
                - Comments are optionally supported, in which case the comment
                  must start at the first column, and the rest of the line will
                  be ignored
        */

        // Parse a single row
        function parseRow(columnStr, rowNumber, noAdd, callbacks) {
            var i = 0,
                c = '',
                cl = '',
                cn = '',
                token = '',
                actualColumn = 0,
                column = 0;

            function read(j) {
                c = columnStr[j];
                cl = columnStr[j - 1];
                cn = columnStr[j + 1];
            }

            function pushType(type) {
                if (dataTypes.length < column + 1) {
                    dataTypes.push([type]);
                }
                if (dataTypes[column][dataTypes[column].length - 1] !== type) {
                    dataTypes[column].push(type);
                }
            }

            function push() {
                if (startColumn > actualColumn || actualColumn > endColumn) {
                    // Skip this column, but increment the column count (#7272)
                    ++actualColumn;
                    token = '';
                    return;
                }

                if (!isNaN(parseFloat(token)) && isFinite(token)) {
                    token = parseFloat(token);
                    pushType('number');
                } else if (!isNaN(Date.parse(token))) {
                    token = token.replace(/\//g, '-');
                    pushType('date');
                } else {
                    pushType('string');
                }


                if (columns.length < column + 1) {
                    columns.push([]);
                }

                if (!noAdd) {
                    // Don't push - if there's a varrying amount of columns
                    // for each row, pushing will skew everything down n slots
                    columns[column][rowNumber] = token;
                }

                token = '';
                ++column;
                ++actualColumn;
            }

            if (!columnStr.trim().length) {
                return;
            }

            if (columnStr.trim()[0] === '#') {
                return;
            }

            for (; i < columnStr.length; i++) {
                read(i);

                // Quoted string
                if (c === '#') {
                    // The rest of the row is a comment
                    push();
                    return;
                } else if (c === '"') {
                    read(++i);

                    while (i < columnStr.length) {
                        if (c === '"' && cl !== '"' && cn !== '"') {
                            break;
                        }

                        if (c !== '"' || (c === '"' && cl !== '"')) {
                            token += c;
                        }

                        read(++i);
                    }

                // Perform "plugin" handling
                } else if (callbacks && callbacks[c]) {
                    if (callbacks[c](c, token)) {
                        push();
                    }

                // Delimiter - push current token
                } else if (c === itemDelimiter) {
                    push();

                // Actual column data
                } else {
                    token += c;
                }
            }

            push();

        }

        // Attempt to guess the delimiter
        // We do a separate parse pass here because we need
        // to count potential delimiters softly without making any assumptions.
        function guessDelimiter(lines) {
            var points = 0,
                commas = 0,
                guessed = false;

            some(lines, function (columnStr, i) {
                var inStr = false,
                    c,
                    cn,
                    cl,
                    token = ''
                    ;


                // We should be able to detect dateformats within 13 rows
                if (i > 13) {
                    return true;
                }

                for (var j = 0; j < columnStr.length; j++) {
                    c = columnStr[j];
                    cn = columnStr[j + 1];
                    cl = columnStr[j - 1];

                    if (c === '#') {
                        // Skip the rest of the line - it's a comment
                        return;
                    } else if (c === '"') {
                        if (inStr) {
                            if (cl !== '"' && cn !== '"') {
                                while (cn === ' ' && j < columnStr.length) {
                                    cn = columnStr[++j];
                                }

                                // After parsing a string, the next non-blank
                                // should be a delimiter if the CSV is properly
                                // formed.

                                if (typeof potDelimiters[cn] !== 'undefined') {
                                    potDelimiters[cn]++;
                                }

                                inStr = false;
                            }
                        } else {
                            inStr = true;
                        }
                    } else if (typeof potDelimiters[c] !== 'undefined') {

                        token = token.trim();

                        if (!isNaN(Date.parse(token))) {
                            potDelimiters[c]++;
                        } else if (isNaN(token) || !isFinite(token)) {
                            potDelimiters[c]++;
                        }

                        token = '';

                    } else {
                        token += c;
                    }

                    if (c === ',') {
                        commas++;
                    }

                    if (c === '.') {
                        points++;
                    }
                }
            });

            // Count the potential delimiters.
            // This could be improved by checking if the number of delimiters
            // equals the number of columns - 1

            if (potDelimiters[';'] > potDelimiters[',']) {
                guessed = ';';
            } else if (potDelimiters[','] > potDelimiters[';']) {
                guessed = ',';
            } else {
                // No good guess could be made..
                guessed = ',';
            }

            // Try to deduce the decimal point if it's not explicitly set.
            // If both commas or points is > 0 there is likely an issue
            if (!options.decimalPoint) {
                if (points > commas) {
                    options.decimalPoint = '.';
                } else {
                    options.decimalPoint = ',';
                }

                // Apply a new decimal regex based on the presumed decimal sep.
                self.decimalRegex = new RegExp( // eslint-disable-line security/detect-non-literal-regexp
                    '^(-?[0-9]+)' +
                    options.decimalPoint +
                    '([0-9]+)$'
                );
            }

            return guessed;
        }

        /* Tries to guess the date format
         *    - Check if either month candidate exceeds 12
         *  - Check if year is missing (use current year)
         *  - Check if a shortened year format is used (e.g. 1/1/99)
         *  - If no guess can be made, the user must be prompted
         * data is the data to deduce a format based on
         */
        function deduceDateFormat(data, limit) {
            var format = 'YYYY/mm/dd',
                thing,
                guessedFormat,
                calculatedFormat,
                i = 0,
                madeDeduction = false,
                // candidates = {},
                stable = [],
                max = [],
                j;

            if (!limit || limit > data.length) {
                limit = data.length;
            }

            for (; i < limit; i++) {
                if (
                    typeof data[i] !== 'undefined' &&
                    data[i] && data[i].length
                ) {
                    thing = data[i]
                            .trim()
                            .replace(/\//g, ' ')
                            .replace(/\-/g, ' ')
                            .split(' ');

                    guessedFormat = [
                        '',
                        '',
                        ''
                    ];


                    for (j = 0; j < thing.length; j++) {
                        if (j < guessedFormat.length) {
                            thing[j] = parseInt(thing[j], 10);

                            if (thing[j]) {

                                max[j] = (!max[j] || max[j] < thing[j]) ?
                                    thing[j] :
                                    max[j];

                                if (typeof stable[j] !== 'undefined') {
                                    if (stable[j] !== thing[j]) {
                                        stable[j] = false;
                                    }
                                } else {
                                    stable[j] = thing[j];
                                }

                                if (thing[j] > 31) {
                                    if (thing[j] < 100) {
                                        guessedFormat[j] = 'YY';
                                    } else {
                                        guessedFormat[j] = 'YYYY';
                                    }
                                    // madeDeduction = true;
                                } else if (thing[j] > 12 && thing[j] <= 31) {
                                    guessedFormat[j] = 'dd';
                                    madeDeduction = true;
                                } else if (!guessedFormat[j].length) {
                                    guessedFormat[j] = 'mm';
                                }
                            }
                        }
                    }
                }
            }

            if (madeDeduction) {

                // This handles a few edge cases with hard to guess dates
                for (j = 0; j < stable.length; j++) {
                    if (stable[j] !== false) {
                        if (
                            max[j] > 12 &&
                            guessedFormat[j] !== 'YY' &&
                            guessedFormat[j] !== 'YYYY'
                        ) {
                            guessedFormat[j] = 'YY';
                        }
                    } else if (max[j] > 12 && guessedFormat[j] === 'mm') {
                        guessedFormat[j] = 'dd';
                    }
                }

                // If the middle one is dd, and the last one is dd,
                // the last should likely be year.
                if (guessedFormat.length === 3 &&
                    guessedFormat[1] === 'dd' &&
                    guessedFormat[2] === 'dd') {
                    guessedFormat[2] = 'YY';
                }

                calculatedFormat = guessedFormat.join('/');

                // If the caculated format is not valid, we need to present an
                // error.

                if (
                    !(options.dateFormats || self.dateFormats)[calculatedFormat]
                ) {
                    // This should emit an event instead
                    fireEvent('deduceDateFailed');
                    return format;
                }

                return calculatedFormat;
            }

            return format;
        }

        /* Figure out the best axis types for the data
         * - If the first column is a number, we're good
         * - If the first column is a date, set to date/time
         * - If the first column is a string, set to categories
         */
        function deduceAxisTypes() {

        }

        if (csv && options.beforeParse) {
            csv = options.beforeParse.call(this, csv);
        }

        if (csv) {

            lines = csv
                .replace(/\r\n/g, '\n') // Unix
                .replace(/\r/g, '\n') // Mac
                .split(options.lineDelimiter || '\n');

            if (!startRow || startRow < 0) {
                startRow = 0;
            }

            if (!endRow || endRow >= lines.length) {
                endRow = lines.length - 1;
            }

            if (options.itemDelimiter) {
                itemDelimiter = options.itemDelimiter;
            } else {
                itemDelimiter = null;
                itemDelimiter = guessDelimiter(lines);
            }

            var offset = 0;

            for (rowIt = startRow; rowIt <= endRow; rowIt++) {
                if (lines[rowIt][0] === '#') {
                    offset++;
                } else {
                    parseRow(lines[rowIt], rowIt - startRow - offset);
                }
            }

            // //Make sure that there's header columns for everything
            // each(columns, function (col) {

            // });

            deduceAxisTypes();

            if ((!options.columnTypes || options.columnTypes.length === 0) &&
                dataTypes.length &&
                dataTypes[0].length &&
                dataTypes[0][1] === 'date' &&
                !options.dateFormat) {
                options.dateFormat = deduceDateFormat(columns[0]);
            }


            // each(lines, function (line, rowNo) {
            //    var trimmed = self.trim(line),
            //        isComment = trimmed.indexOf('#') === 0,
            //        isBlank = trimmed === '',
            //        items;

            //    if (
            //        rowNo >= startRow &&
            //        rowNo <= endRow &&
            //        !isComment && !isBlank
            //    ) {
            //        items = line.split(itemDelimiter);
            //        each(items, function (item, colNo) {
            //            if (colNo >= startColumn && colNo <= endColumn) {
            //                if (!columns[colNo - startColumn]) {
            //                    columns[colNo - startColumn] = [];
            //                }

            //                columns[colNo - startColumn][activeRowNo] = item;
            //            }
            //        });
            //        activeRowNo += 1;
            //    }
            // });
            //

            this.dataFound();
        }

        return columns;
    },

    /**
     * Parse a HTML table
     */
    parseTable: function () {
        var options = this.options,
            table = options.table,
            columns = this.columns,
            startRow = options.startRow || 0,
            endRow = options.endRow || Number.MAX_VALUE,
            startColumn = options.startColumn || 0,
            endColumn = options.endColumn || Number.MAX_VALUE;

        if (table) {

            if (typeof table === 'string') {
                table = doc.getElementById(table);
            }

            each(table.getElementsByTagName('tr'), function (tr, rowNo) {
                if (rowNo >= startRow && rowNo <= endRow) {
                    each(tr.children, function (item, colNo) {
                        if (
                            (item.tagName === 'TD' || item.tagName === 'TH') &&
                            colNo >= startColumn &&
                            colNo <= endColumn
                        ) {
                            if (!columns[colNo - startColumn]) {
                                columns[colNo - startColumn] = [];
                            }

                            columns[colNo - startColumn][rowNo - startRow] =
                                item.innerHTML;
                        }
                    });
                }
            });

            this.dataFound(); // continue
        }
        return columns;
    },


    /**
     * Fetch or refetch live data
     */
    fetchLiveData: function () {
        var chart = this.chart,
            options = this.options,
            maxRetries = 3,
            currentRetries = 0,
            pollingEnabled = options.enablePolling,
            updateIntervalMs = (options.dataRefreshRate || 2) * 1000,
            originalOptions = merge(options);

        if (!options ||
            (!options.csvURL && !options.rowsURL && !options.columnsURL)
        ) {
            return false;
        }

        // Do not allow polling more than once a second
        if (updateIntervalMs < 1000) {
            updateIntervalMs = 1000;
        }

        delete options.csvURL;
        delete options.rowsURL;
        delete options.columnsURL;

        function performFetch(initialFetch) {

            // Helper function for doing the data fetch + polling
            function request(url, done, tp) {
                if (!url || url.indexOf('http') !== 0) {
                    if (url && options.error) {
                        options.error('Invalid URL');
                    }
                    return false;
                }

                if (initialFetch) {
                    clearTimeout(chart.liveDataTimeout);
                    chart.liveDataURL = url;
                }

                function poll() {
                    // Poll
                    if (pollingEnabled && chart.liveDataURL === url) {
                        // We need to stop doing this if the URL has changed
                        chart.liveDataTimeout =
                            setTimeout(performFetch, updateIntervalMs);
                    }
                }

                Highcharts.ajax({
                    url: url,
                    dataType: tp || 'json',
                    success: function (res) {
                        if (chart && chart.series) {
                            done(res);
                        }

                        poll();

                    },
                    error: function (xhr, text) {
                        if (++currentRetries < maxRetries) {
                            poll();
                        }

                        return options.error && options.error(text, xhr);
                    }
                });

                return true;
            }

            if (!request(originalOptions.csvURL, function (res) {
                chart.update({
                    data: {
                        csv: res
                    }
                });
            }, 'text')) {
                if (!request(originalOptions.rowsURL, function (res) {
                    chart.update({
                        data: {
                            rows: res
                        }
                    });
                })) {
                    request(originalOptions.columnsURL, function (res) {
                        chart.update({
                            data: {
                                columns: res
                            }
                        });
                    });
                }
            }
        }

        performFetch(true);

        return (options &&
            (options.csvURL || options.rowsURL || options.columnsURL)
        );
    },


    /**
     * Parse a Google spreadsheet.
     */
    parseGoogleSpreadsheet: function () {
        var options = this.options,
            googleSpreadsheetKey = options.googleSpreadsheetKey,
            chart = this.chart,
            // use sheet 1 as the default rather than od6
            // as the latter sometimes cause issues (it looks like it can
            // be renamed in some cases, ref. a fogbugz case).
            worksheet = options.googleSpreadsheetWorksheet || 1,
            startRow = options.startRow || 0,
            endRow = options.endRow || Number.MAX_VALUE,
            startColumn = options.startColumn || 0,
            endColumn = options.endColumn || Number.MAX_VALUE,
            refreshRate = (options.dataRefreshRate || 2) * 1000;

        if (refreshRate < 4000) {
            refreshRate = 4000;
        }

        /*
         * Fetch the actual spreadsheet using XMLHttpRequest
         */
        function fetchSheet(fn) {
            var url = [
                'https://spreadsheets.google.com/feeds/cells',
                googleSpreadsheetKey,
                worksheet,
                'public/values?alt=json'
            ].join('/');

            Highcharts.ajax({
                url: url,
                dataType: 'json',
                success: function (json) {
                    fn(json);

                    if (options.enablePolling) {
                        setTimeout(function () {
                            fetchSheet(fn);
                        }, options.dataRefreshRate);
                    }
                },
                error: function (xhr, text) {
                    return options.error && options.error(text, xhr);
                }
            });
        }

        if (googleSpreadsheetKey) {

            delete options.googleSpreadsheetKey;

            fetchSheet(function (json) {
                // Prepare the data from the spreadsheat
                var columns = [],
                    cells = json.feed.entry,
                    cell,
                    cellCount = (cells || []).length,
                    colCount = 0,
                    rowCount = 0,
                    val,
                    gr,
                    gc,
                    cellInner,
                    i;

                if (!cells || cells.length === 0) {
                    return false;
                }

                // First, find the total number of columns and rows that
                // are actually filled with data
                for (i = 0; i < cellCount; i++) {
                    cell = cells[i];
                    colCount = Math.max(colCount, cell.gs$cell.col);
                    rowCount = Math.max(rowCount, cell.gs$cell.row);
                }

                // Set up arrays containing the column data
                for (i = 0; i < colCount; i++) {
                    if (i >= startColumn && i <= endColumn) {
                        // Create new columns with the length of either
                        // end-start or rowCount
                        columns[i - startColumn] = [];
                    }
                }

                // Loop over the cells and assign the value to the right
                // place in the column arrays
                for (i = 0; i < cellCount; i++) {
                    cell = cells[i];
                    gr = cell.gs$cell.row - 1; // rows start at 1
                    gc = cell.gs$cell.col - 1; // columns start at 1

                    // If both row and col falls inside start and end set the
                    // transposed cell value in the newly created columns
                    if (gc >= startColumn && gc <= endColumn &&
                        gr >= startRow && gr <= endRow) {

                        cellInner = cell.gs$cell || cell.content;

                        val = null;

                        if (cellInner.numericValue) {
                            if (cellInner.$t.indexOf('/') >= 0 ||
                                cellInner.$t.indexOf('-') >= 0) {
                                // This is a date - for future reference.
                                val = cellInner.$t;
                            } else if (cellInner.$t.indexOf('%') > 0) {
                                // Percentage
                                val = parseFloat(cellInner.numericValue) * 100;
                            } else {
                                val = parseFloat(cellInner.numericValue);
                            }
                        } else if (cellInner.$t && cellInner.$t.length) {
                            val = cellInner.$t;
                        }

                        columns[gc - startColumn][gr - startRow] = val;
                    }
                }

                // Insert null for empty spreadsheet cells (#5298)
                each(columns, function (column) {
                    for (i = 0; i < column.length; i++) {
                        if (column[i] === undefined) {
                            column[i] = null;
                        }
                    }
                });

                if (chart && chart.series) {
                    chart.update({
                        data: {
                            columns: columns
                        }
                    });
                }
            });
        }

        // This is an intermediate fetch, so always return false.
        return false;
    },

    /**
     * Trim a string from whitespace
     */
    trim: function (str, inside) {
        if (typeof str === 'string') {
            str = str.replace(/^\s+|\s+$/g, '');

            // Clear white space insdie the string, like thousands separators
            if (inside && /^[0-9\s]+$/.test(str)) {
                str = str.replace(/\s/g, '');
            }

            if (this.decimalRegex) {
                str = str.replace(this.decimalRegex, '$1.$2');
            }
        }
        return str;
    },

    /**
     * Parse numeric cells in to number types and date types in to true dates.
     */
    parseTypes: function () {
        var columns = this.columns,
            col = columns.length;

        while (col--) {
            this.parseColumn(columns[col], col);
        }

    },

    /**
     * Parse a single column. Set properties like .isDatetime and .isNumeric.
     */
    parseColumn: function (column, col) {
        var rawColumns = this.rawColumns,
            columns = this.columns,
            row = column.length,
            val,
            floatVal,
            trimVal,
            trimInsideVal,
            firstRowAsNames = this.firstRowAsNames,
            isXColumn = inArray(col, this.valueCount.xColumns) !== -1,
            dateVal,
            backup = [],
            diff,
            chartOptions = this.chartOptions,
            descending,
            columnTypes = this.options.columnTypes || [],
            columnType = columnTypes[col],
            forceCategory = isXColumn && ((
                chartOptions &&
                chartOptions.xAxis &&
                splat(chartOptions.xAxis)[0].type === 'category'
            ) || columnType === 'string');

        if (!rawColumns[col]) {
            rawColumns[col] = [];
        }
        while (row--) {
            val = backup[row] || column[row];

            trimVal = this.trim(val);
            trimInsideVal = this.trim(val, true);
            floatVal = parseFloat(trimInsideVal);

            // Set it the first time
            if (rawColumns[col][row] === undefined) {
                rawColumns[col][row] = trimVal;
            }

            // Disable number or date parsing by setting the X axis type to
            // category
            if (forceCategory || (row === 0 && firstRowAsNames)) {
                column[row] = '' + trimVal;

            } else if (+trimInsideVal === floatVal) { // is numeric

                column[row] = floatVal;

                // If the number is greater than milliseconds in a year, assume
                // datetime
                if (
                    floatVal > 365 * 24 * 3600 * 1000 &&
                    columnType !== 'float'
                ) {
                    column.isDatetime = true;
                } else {
                    column.isNumeric = true;
                }

                if (column[row + 1] !== undefined) {
                    descending = floatVal > column[row + 1];
                }

            // String, continue to determine if it is a date string or really a
            // string
            } else {
                if (trimVal && trimVal.length) {
                    dateVal = this.parseDate(val);
                }

                // Only allow parsing of dates if this column is an x-column
                if (isXColumn && isNumber(dateVal) && columnType !== 'float') {
                    backup[row] = val;
                    column[row] = dateVal;
                    column.isDatetime = true;

                    // Check if the dates are uniformly descending or ascending.
                    // If they are not, chances are that they are a different
                    // time format, so check for alternative.
                    if (column[row + 1] !== undefined) {
                        diff = dateVal > column[row + 1];
                        if (diff !== descending && descending !== undefined) {
                            if (this.alternativeFormat) {
                                this.dateFormat = this.alternativeFormat;
                                row = column.length;
                   