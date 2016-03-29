/*! light-blue - v3.3.0 - 2016-03-08 */
$(function () {
    function a() {
        function a(a) {
            var b = [{
                name: "id",
                label: "ID",
                editable: !1,
                cell: Backgrid.IntegerCell.extend({orderSeparator: ""})
            }, {name: "name", label: "Name", cell: "string"}, {
                name: "pop",
                label: "Population",
                cell: "integer"
            }, {name: "url", label: "URL", cell: "uri"}];
            LightBlue.isScreen("xs") && b.splice(3, 1);
            var c = new Backgrid.Grid({
                columns: b,
                collection: a,
                className: "table table-striped table-editable no-margin mb-sm"
            }), d = new Backgrid.Extension.Paginator({
                slideScale: .25,
                goBackFirstOnSort: !1,
                collection: a,
                controls: {
                    rewind: {label: '<i class="fa fa-angle-double-left fa-lg"></i>', title: "First"},
                    back: {label: '<i class="fa fa-angle-left fa-lg"></i>', title: "Previous"},
                    forward: {label: '<i class="fa fa-angle-right fa-lg"></i>', title: "Next"},
                    fastForward: {label: '<i class="fa fa-angle-double-right fa-lg"></i>', title: "Last"}
                }
            });
            $("#table-dynamic").html("").append(c.render().$el).append(d.render().$el)
        }

        Backgrid.InputCellEditor.prototype.attributes["class"] = "form-control input-sm";
        var b = Backbone.Model.extend({}), c = Backbone.PageableCollection.extend({
            model: b,
            url: "js/json/pageable-territories.json",
            state: {pageSize: 9},
            mode: "client"
        }), d = new c, e = d;
        PjaxApp.onResize(function () {
            a(d)
        }), a(d), $("#search-countries").keyup(function () {
            var b = $(this), d = e.fullCollection.filter(function (a) {
                return ~a.get("name").toUpperCase().indexOf(b.val().toUpperCase())
            });
            a(new c(d, {state: {firstPage: 1, currentPage: 1}}))
        }), d.fetch()
    }

    function b() {
        $.extend(!0, $.fn.dataTable.defaults, {
            sDom: "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
            sPaginationType: "bootstrap",
            oLanguage: {sLengthMenu: "_MENU_ records per page"}
        }), $.extend($.fn.dataTableExt.oStdClasses, {sWrapper: "dataTables_wrapper form-inline"}), $.fn.dataTableExt.oApi.fnPagingInfo = function (a) {
            return {
                iStart: a._iDisplayStart,
                iEnd: a.fnDisplayEnd(),
                iLength: a._iDisplayLength,
                iTotal: a.fnRecordsTotal(),
                iFilteredTotal: a.fnRecordsDisplay(),
                iPage: -1 === a._iDisplayLength ? 0 : Math.ceil(a._iDisplayStart / a._iDisplayLength),
                iTotalPages: -1 === a._iDisplayLength ? 0 : Math.ceil(a.fnRecordsDisplay() / a._iDisplayLength)
            }
        }, $.extend($.fn.dataTableExt.oPagination, {
            bootstrap: {
                fnInit: function (a, b, c) {
                    var d = a.oLanguage.oPaginate, e = function (b) {
                        b.preventDefault(), a.oApi._fnPageChange(a, b.data.action) && c(a)
                    };
                    $(b).append('<ul class="pagination no-margin"><li class="prev disabled"><a href="#">' + d.sPrevious + '</a></li><li class="next disabled"><a href="#">' + d.sNext + "</a></li></ul>");
                    var f = $("a", b);
                    $(f[0]).bind("click.DT", {action: "previous"}, e), $(f[1]).bind("click.DT", {action: "next"}, e)
                }, fnUpdate: function (a, b) {
                    var c, d, e, f, g, h, i = 5, j = a.oInstance.fnPagingInfo(), k = a.aanFeatures.p, l = Math.floor(i / 2);
                    for (j.iTotalPages < i ? (g = 1, h = j.iTotalPages) : j.iPage <= l ? (g = 1, h = i) : j.iPage >= j.iTotalPages - l ? (g = j.iTotalPages - i + 1, h = j.iTotalPages) : (g = j.iPage - l + 1, h = g + i - 1), c = 0, d = k.length; d > c; c++) {
                        for ($("li:gt(0)", k[c]).filter(":not(:last)").remove(), e = g; h >= e; e++)f = e == j.iPage + 1 ? 'class="active"' : "", $("<li " + f + '><a href="#">' + e + "</a></li>").insertBefore($("li:last", k[c])[0]).bind("click", function (c) {
                            c.preventDefault(), a._iDisplayStart = (parseInt($("a", this).text(), 10) - 1) * j.iLength, b(a)
                        });
                        0 === j.iPage ? $("li:first", k[c]).addClass("disabled") : $("li:first", k[c]).removeClass("disabled"), j.iPage === j.iTotalPages - 1 || 0 === j.iTotalPages ? $("li:last", k[c]).addClass("disabled") : $("li:last", k[c]).removeClass("disabled")
                    }
                }
            }
        });
        var a = [];
        $("#datatable-table").find("thead th").each(function () {
            $(this).hasClass("no-sort") ? a.push({bSortable: !1}) : a.push(null)
        }), $("#datatable-table").dataTable({
            sDom: "<'row'<'col-md-6 hidden-xs'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
            oLanguage: {sLengthMenu: "_MENU_", sInfo: "Showing <strong>_START_ to _END_</strong> of _TOTAL_ entries"},
            oClasses: {sFilter: "pull-right", sFilterInput: "form-control input-transparent ml-sm"},
            aoColumns: a
        }), $(".dataTables_length select").selectpicker({width: "auto"})
    }

    function c() {
        $(".widget").widgster(), a(), b()
    }

    c(), PjaxApp.onPageLoad(c)
});