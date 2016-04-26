var TableEditable = function () {

    var handleTable = function () {

        function restoreRow(oTable, nRow) {
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);

            for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                oTable.fnUpdate(aData[i], nRow, i, false);
            }

            oTable.fnDraw();
        }

        function editRow(oTable, nRow) {
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);
            jqTds[0].innerHTML = '<input id="username" name="username" type="text" class="form-control input-small" value="' + aData[0] + '">';
            jqTds[1].innerHTML = '<input id="first_name" name="first_name" type="text" class="form-control input-small" value="' + aData[1] + '">';
            jqTds[2].innerHTML = '<input id="last_name" name="last_name" type="text" class="form-control input-small" value="' + aData[2] + '">';
            jqTds[3].innerHTML = '<input id="email" name="email" type="text" class="form-control input-small" value="' + aData[3] + '">';
            //jqTds[4].innerHTML = '<input name="role_id" type="text" class="form-control input-small" value="' + aData[4] + '">';
            jqTds[4].innerHTML = '<input id="password" name="password" type="text" class="form-control input-small" value="' + aData[4] + '">';

            if(aData[5]=="Super Admin") {
                jqTds[5].innerHTML = '<select id="role_id" name="role_id" class="form-control input-small">' +
                    '<option value="1">Super Admin</option>' +
                    '<option value="2">Admin</option>' +
                    '</select>';
            }else{
                jqTds[5].innerHTML = '<select id="role_id" name="role_id" class="form-control input-small">' +
                    '<option value="2">Admin</option>' +
                    '<option value="1">Super Admin</option>' +
                    '</select>';
            }
            jqTds[6].innerHTML = '<a class="edit" href="">Save</a>';
            jqTds[7].innerHTML = '<a class="cancel" href="">Cancel</a>';
        }

        function saveRow(oTable, nRow) {
            var jqInputs = $('input', nRow);
            var uId = nRow.getAttribute('data-id');
            var e = document.getElementById("role_id");
            var strUser = e.options[e.selectedIndex].text;

            oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
            oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
            oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
            oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
            //oTable.fnUpdate(jqInputs[5].value, nRow, 5, false);
            oTable.fnUpdate(jqInputs[4].value, nRow, 4, false);
            //oTable.fnUpdate(jqInputs[4].options[jqInputs[4].selectedIndex].value, nRow, 4, false);
            oTable.fnUpdate(strUser, nRow, 5, false);

            oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 6, false);
            //oTable.fnUpdate('<a class="delete" href="">Delete</a>', nRow, 7, false);
            oTable.fnUpdate('<a class="getDelId btn default" onclick="delIdSend('+ uId +')" data-toggle="modal" href="#delete-model">Delete</a>', nRow, 7, false);

            //console.log(jqInputs[4].options[jqInputs[4].selectedIndex].value);
            oTable.fnDraw();
        }

        function cancelEditRow(oTable, nRow) {
            //console.log("Hello ");
            var jqInputs = $('input', nRow);
            oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
            oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
            oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
            oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
            oTable.fnUpdate(jqInputs[4].value, nRow, 4, false);
            oTable.fnUpdate(jqInputs[5].value, nRow, 5, false);
            oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 6, false);
            oTable.fnDraw();
        }

        var table = $('#sample_editable_1');

        var oTable = table.dataTable({

            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js).
            // So when dropdowns used the scrollable div should be removed.
            //"dom": "<'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],

            // Or you can use remote translation file
            //"language": {
            //   url: '//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Portuguese.json'
            //},

            // set the initial value
            "pageLength": 10,

            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{ // set default column settings
                'orderable': true,
                'targets': [0]
            }, {
                "searchable": true,
                "targets": [0]
            }],
            "order": [
                [0, "asc"]
            ] // set first column as a default sort by asc
        });

        var tableWrapper = $("#sample_editable_1_wrapper");

        tableWrapper.find(".dataTables_length select").select2({
            showSearchInput: true //hide search box with special css class
        }); // initialize select2 dropdown

        var nEditing = null;
        var nNew = false;

        $('#sample_editable_1_new').click(function (e) {
            e.preventDefault();

            if (nNew && nEditing) {
                if (confirm("Previose row not saved. Do you want to save it ?")) {
                    saveRow(oTable, nEditing); // save
                    $(nEditing).find("td:first").html("Untitled");
                    nEditing = null;
                    nNew = false;

                } else {
                    oTable.fnDeleteRow(nEditing); // cancel
                    nEditing = null;
                    nNew = false;

                    return;
                }
            }

            var aiNew = oTable.fnAddData(['', '', '', '', '', '']);
            var nRow = oTable.fnGetNodes(aiNew[0]);
            editRow(oTable, nRow);
            nEditing = nRow;
            nNew = true;
        });


        /*
         table.on('click', '.delete', function (e) {
         e.preventDefault();
         console.log("hello");
         if (confirm("Are you sure to delete this row ?") == false) {
         return;
         }

         var nRow = $(this).parents('tr')[0];
         console.log(nRow);
         console.log(oTable);
         oTable.fnDeleteRow(nRow);
         alert("Deleted! Do not forget to do some ajax to sync with backend :)");
         });
         */

        $('#confirmDeleteButton').click(function (e) {
            e.preventDefault();

            var urlPar = $('#confirmDeleteButton').attr('delId');
            var actionUrl = APP_URL+"/admin/deleteuser/"+urlPar;  //APP_URL global variable for base URL set in footer template
            var token=$('input[name=_token]').val();
            //oTable.fnDeleteRow($('#'+urlPar));
            console.log(actionUrl);
            $.ajax({
                type: "GET",
                headers: {'X-CSRF-TOKEN': token},
                url: actionUrl,
                success: function (html) {
                    oTable.fnDeleteRow($('#'+urlPar)); //Removing Row

                }
            })

        });

        table.on('click', '.cancel', function (e) {
            e.preventDefault();
            if (nNew) {
                oTable.fnDeleteRow(nEditing);
                nEditing = null;
                nNew = false;
            } else {
                restoreRow(oTable, nEditing);
                nEditing = null;
            }
        });

        table.on('click', '.edit', function (e) {
            e.preventDefault();

            /* Get the row as a parent of the link that was clicked on */
            var nRow = $(this).parents('tr')[0];

            if (nEditing !== null && nEditing != nRow) {
                /* Currently editing - but not this row - restore the old before continuing to edit mode */
                restoreRow(oTable, nEditing);
                editRow(oTable, nRow);
                nEditing = nRow;
            } else if (nEditing == nRow && this.innerHTML == "Save") {
                /* Editing this row and want to save it */
                saveRow(oTable, nEditing);
                nEditing = null;
                var username = nRow.cells[0].innerHTML;
                var first_name = nRow.cells[1].innerHTML;
                var last_name = nRow.cells[2].innerHTML;
                var email =  nRow.cells[3].innerHTML;
                var password = nRow.cells[4].innerHTML;
                var role = nRow.cells[5].innerHTML;
                var token=$('input[name=_token]').val();

                $.ajax({
                    type: "POST",
                    headers: {'X-CSRF-TOKEN': token},
                    url: APP_URL + "/admin/adminoperations", //APP_URL global variable for base URL set in footer template
                    data: {
                        username: username,
                        first_name: first_name,
                        last_name: last_name,
                        email: email,
                        password: password,
                        role: role
                    },
                    success: function (return_data) {
                        console.log(return_data);
                    }
                })
            } else {
                /* No edit in progress - let's start one */
                editRow(oTable, nRow);
                nEditing = nRow;
            }
        });
    }

    return {

        //main function to initiate the module
        init: function () {
            handleTable();
        }

    };

}();