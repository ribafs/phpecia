const app = {
  buildForm() {
    return [
      $('#name').val(),
      $('#position').val(),
      $('#office').val(),
      $('#extn').val(),
      $('#startDate')
        .val()
        .replace(new RegExp('-', 'g'), '/'),
      `$${$('#salary').val()}`
    ];
  },
  sendToServer() {
    const formData = this.buildForm();
    axios.post('http://localhost:2000/record', formData)
      .then(response => console.log(response));
  },
  addRow(dataTable, data) {
    const addedRow = dataTable.row.add(data).draw();
    addedRow.show().draw(false);

    const addedRowNode = addedRow.node();
    console.log(addedRowNode);
    $(addedRowNode).addClass('highlight');
  },
  selectRow(dataTable) {
    if ($(this).hasClass('selected')) {
      $(this).removeClass('selected');
    } else {
      dataTable.$('tr.selected').removeClass('selected');
      $(this).addClass('selected');
    }
  },
  removeRow(dataTable) {
    dataTable.row('.selected').remove().draw( false );
  },
  start() {
    const dataTable = $('#realtime').DataTable({
      data: dataSet,
      columns: [
        { title: 'Name' },
        { title: 'Position' },
        { title: 'Office' },
        { title: 'Extn.' },
        { title: 'Start date' },
        { title: 'Salary' }
      ]
    });

    $('#add').on('click', this.sendToServer.bind(this));
    const self = this;
    $('#realtime tbody').on('click', 'tr', function(){
      self.selectRow.bind(this, dataTable)();
    });
    $('#remove').on('click', this.removeRow.bind(this, dataTable));

    // Pusher
    var pusher = new Pusher('App Key', {
      cluster: 'CLUSTER',
      encrypted: true
    });

    var channel = pusher.subscribe('records');
    channel.bind('new-record', (data) => {
      this.addRow(dataTable, data);
    });
  }
};

$(document).ready(() => app.start());
