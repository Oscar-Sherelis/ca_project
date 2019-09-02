'use strict';

// Kasparas Aleknavicius
/**
 * kasparas@codeacademy.lt
 * kasparas.aleknavicius@gmail.com
 * 860014976
 * 
 * Virtual host to make url
 * 
 * git -rm cache
 * 
 * psr-4 code standart syntax 
 * 
 * bootloader file clases uzloadina DB 
 * 
 * session_start() - padaro user-side cookie kur galime pasiekti be reload
 * Kaip i request header user-side cookie ateina info? 
 * I headeri ateina info kuri yra prieinama po refresh
 * 
 * 
 * FileDB getRowsWhere  need to understand function
 * 
 * Procedurinis ir functional tas pats nuo virsaus i apacia
 * 
 * unset sunaikina refferensa, bet ne verte
 * 
 * negalima daryti function a($x);
 * a($b + $c); draudziama
 * 
 * foreach value paskutini galima paimti
 * 
 * rainbow table helps to crak hashings and md5 ???
 * 
 * Hash solt? solt is stored to other column
 * PDO is still usable
 * 
 * callback function - dinamine funkcija
 */

const endpoints = {
    get: 'api/participants/get.php',
    create: 'api/participants/create.php',
    update: 'api/participants/update.php',
    delete: 'api/participants/delete.php'
};

/**
 * Executes API request
 * @param {type} url Endpoint URL. Communication with API
 * @param {type} formData instance of FormData. Sending Data to API
 * @param {type} success Success callback
 * @param {type} fail Fail callback
 * @returns {undefined}
 */
function api(url, formData, success, fail) {
    fetch(url, {
        method: 'POST',
        body: formData
    }).then(response => response.json())
            .then(obj => {
                // checking status from API
                if (obj.status === 'success') { 
                    success(obj.data);
                } else {
                    fail(obj.errors);
                }
            })
            .catch(e => {
                console.log(e);
                fail(['Could not connect to API!']);
            });
}

/**
 * Form array
 * Contains all form-related functionality
 * 
 * Object forms
 */
const forms = {
    /**
     * Create Form
     */
    create: {
        init: function () {
            console.log('Initializing create form...');
            // onSubmit and getElement - functions bellow
            // document.getElementById("create-form").addEventListener('submit', this.onSubmitListener)
            // onSubmit - make form data, select form input values and sends them to API
            this.getElement().addEventListener('submit', this.onSubmitListener);
        },
        getElement: function () {
            return document.getElementById("create-form");
        },
        onSubmitListener: function (e) {
            e.preventDefault();
            let formData = new FormData(e.target);
            // from main object where are all other objects takes success object, what is form.create.success
            api(endpoints.create, formData, forms.create.success, forms.create.fail);
        },
        // when we call success in api function it will add new row, hide errors
        // 
        success: function (data) {
            // gets form with id = create-form
            const element = forms.create.getElement();

            table.row.append(data);
            forms.ui.errors.hide(element);
            // clears all input values by name atribute
            forms.ui.clear(element);
            forms.ui.flash.class(element, 'success');
        },
        fail: function (errors) {
            forms.ui.errors.show(forms.create.getElement(), errors);
        }
    },
    /**
     * Update Form
     */
    update: {
        init: function () {
            console.log('Initializing update form...');
            this.elements.form().addEventListener('submit', this.onSubmitListener);

            const closeBtn = forms.update.elements.modal().querySelector('.close');
            closeBtn.addEventListener('click', forms.update.onCloseListener);
        },
        elements: {
            form: function () {
                return document.getElementById("update-form");
            },
            modal: function () {
                return document.getElementById("update-modal");
            }
        },
        onSubmitListener: function (e) {
            e.preventDefault();
            let formData = new FormData(e.target);
            let id = forms.update.elements.form().getAttribute('data-id');
            formData.append('id', id);

            api(endpoints.update, formData, forms.update.success, forms.update.fail);
        },
        success: function (data) {
            table.row.update(data);
            forms.update.hide();
        },
        fail: function (errors) {
            forms.ui.errors.show(this.elements.form(), errors);
        },
        // ??? 
        fill: function (data) {
            forms.ui.fill(forms.update.elements.form(), data);
        },
        onCloseListener: function (e) {
            forms.update.hide();
        },
        show: function () {
            this.elements.modal().style.display = 'block';
        },
        hide: function () {
            this.elements.modal().style.display = 'none';
        }
    },
    /**
     * Common/Universal Form UI Functions
     */
    ui: {
        init: function () {
            // Function has to exist
            // since we're calling init() for
            // all elements withing forms object
        },
        /**
         * Fills form fields with data
         * Each data index corelates with input name attribute
         * 
         * @param {Element} form
         * @param {Object} data 
         */
        fill: function (form, data) {
            form.setAttribute('data-id', data.id);

            // Object.keys makes from data keys array ('')
            Object.keys(data).forEach(data_id => {
                if (form[data_id]) { //
                    const input = form.querySelector('input[name="' + data_id + '"]');
                    if (input) {
                        input.value = data[data_id];
                    }
                }
            });
        },
        clear: function (form) {
            // from form select all "name" attributes
            var fields = form.querySelectorAll('[name]')
            fields.forEach(field => {
                // deletes input values
                field.value = '';
            });
        },
        flash: {
            class: function (element, class_name) {
                // element = form

                // takve element class ='value'
                const prev = element.className;
                
                // classList???
                //add other class and set time for 1 sec and disapears
                element.className += class_name;
                setTimeout(function () {
                    element.className = prev;
                }, 1000);
            }
        },
        /**
         * Form-error related functionality
         */
        errors: {
            /**
             * Shows errors in form
             * Each error index correlates with input name attribute
             * 
             * @param {Element} form
             * @param {Object} errors
             */
            show: function (form, errors) {
                this.hide(form);
                Object.keys(errors).forEach(function (error_id) {
                    // if is error it will override name ???
                    const field = form.querySelector('input[name="' + error_id + '"]');
                    const span = document.createElement("span");
                    span.className = 'field-error';
                    console.log(error_id);
                    span.innerHTML = errors[error_id];
                    field.parentNode.append(span);

                    console.log('Form error in field: ' + error_id + ':' + errors[error_id]);
                });
            },
            /**
             * Hides (destroys) all errors in form
             * @param {type} form
             */
            hide: function (form) {
                const errors = form.querySelectorAll('.field-error');
                if (errors) {
                    errors.forEach( node => {
                        node.remove();
                    })
                    Array.prototype.forEach.call(errors, function (node) {
                        node.remove();
                    });
                }
            }
        }
    }
};

/**
 * Table-related functionality
 */
const table = {
    getElement: function () {
        return document.querySelector('#person-table tbody');
    },
    init: function () {
        // takes data
        this.data.load();

        // generate buttons for table???
        Object.keys(this.buttons).forEach(buttonId => {
            table.buttons[buttonId].init();
        });
    },
    /**
     * Data-Related functionality
     */
    data: {
        /**
         * Loads data and populates table from API
         * @returns {undefined}
         */
        load: function () {
            api(endpoints.get, null, this.success, this.fail);
        },
        success: function (data) {
            // Object.keys(data) takes array keys as values
            Object.keys(data).forEach(i => {
                table.row.append(data[i]);
            });
        },
        fail: function (errors) {
            console.log(errors);
        }
    },
    /**
     * Operations with rows
     */
    row: {
        /**
         * Builds row element from data
         * 
         * @param {Object} data
         * @returns {Element}
         */
        build: function (data) {
            const row = document.createElement('tr');
            // adds id to tr
            row.setAttribute('data-id', data.id);

            Object.keys(data).forEach(data_id => {
                let td = document.createElement('td');
                td.innerHTML = data[data_id];
                row.append(td);
            });

            let buttons = {
                delete: 'Ištrinti',
                edit: 'Redaguoti'
            };

            // ???
            Object.keys(buttons).forEach(button_id => {
                let btn = document.createElement('td');
                btn.innerHTML = buttons[button_id];
                btn.className = button_id;
                row.append(btn);
            });

            return row;
        },
        /**
         * Appends row to table from data
         * 
         * @param {Object} data
         */
        append: function (data) {
            table.getElement().append(this.build(data));
        },
        /**
         * Updates existing row in table from data
         * Row is selected via "id" index in data
         * 
         * @param {Object} data
         */
        update: function (data) {
            // ???
            let row = table.getElement().querySelector('tr[data-id="' + data.id + '"]');
            row.replaceWith(this.build(data));
            row = this.build(data);
        },
        /**
         * Deletes existing row
         * @param {Integer} id
         */
        delete: function (id) {
            const row = table.getElement().querySelector('tr[data-id="' + id + '"]');
            row.remove();
        }
    },
    buttons: {
        delete: {
            init: function () {
                table.getElement().addEventListener('click', this.onClickListener);
            },
            getElements: function () {
                return document.querySelectorAll('.delete-btn');
            },
            onClickListener: function (e) {
                if (e.target.className === 'delete') {
                    let formData = new FormData();

                    // su closest einam i artimiausia tr
                    // kur yra musu paspaustas 'delete'
                    let tr = e.target.closest('tr');

                    formData.append('id', tr.getAttribute('data-id'));
                    api(endpoints.delete, formData, table.buttons.delete.success, table.buttons.delete.fail);
                }
            },
            // data is response from API
            success: function (data) {
                console.log(data);
                table.row.delete(data.id);
            },
            fail: function (errors) {
                alert(errors[0]);
            }
        },
        edit: {
            init: function () {
                table.getElement().addEventListener('click', this.onClickListener);
            },
            getElements: function () {
                return document.querySelectorAll('.edit-btn');
            },
            onClickListener: function (e) {
                if (e.target.className === 'edit') {
                    let formData = new FormData();

                    // !!! data-id = tr id
                    let tr = e.target.closest('tr');

                    formData.append('row_id', tr.getAttribute('data-id'));
                    api(endpoints.get, formData, table.buttons.edit.success, table.buttons.edit.fail);
                }
            },
            // data is object array
            success: function (data) {
                // select firs person!!!
                let person_data = data[0];
                forms.update.show();
                forms.update.fill(person_data);
            },
            fail: function (errors) {
                alert(errors[0]);
            }
        }
    }
};

/**
 * Core page functionality
 * Here all JS runs
 */
const app = {
    init: function () {
        // Initialize all forms
        Object.keys(forms).forEach(formId => {
            forms[formId].init();
        });

        table.init();
    }
};

// Launch App
app.init();