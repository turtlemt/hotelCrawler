var links = [];
var casper = require('casper').create({
});
var utils = require('utils');
var fs = require('fs');
var targets = [
  {name: 'value', url:'http://www.twstay.com/Site/booking.aspx?BNB=value&orderType=2', data: []},
  {name: 'sami', url:'http://www.twstay.com/Site/booking.aspx?BNB=sami&orderType=2', data: []},
];
var myTarget = {};

//casper.start();

/*targets.forEach(function(target) {
    casper.thenOpen(target.url, function() {
      casper.then(function() {this.getBooking(target)});
    });
});*/

casper.start().each(targets, function(self, target, key) {

  //self.thenOpen(target.url);

  casper.thenOpen(target.url, function() {
    myTarget = target;

    links = this.evaluate(function(myTarget) {
      var elements = __utils__.findAll('tr.GridviewScrollItem td');
      var output = {elements: []};
      elements.forEach(function(e) {
        output.elements.push({title: e.getAttribute('title'), date: e.getAttribute('onclick')});
      });
      return output;
    }, myTarget);
    targets[key].data = links;
  });
});

/*
 * Unuse function.
 */
function getBooking() {
  var ooo = myTarget.name;this.echo(ooo);
  links = this.evaluate(function(ooo) {
    var elements = __utils__.findAll('tr.GridviewScrollItem td');
    /*var today = new Date();
    var day = today.getDate() + 1;
    var month = today.getMonth() + 1;
    var year = today.getFullYear();
    if (day < 10) {
      day = '0' + day;
    }
    if (month < 10) {
      month = '0' + month;
    }
    var formatDate = year + '/' + month + '/' + day;*/

    var output = {elements: []};
    elements.forEach(function(e) {
      output.elements.push({name: ooo, title: e.getAttribute('title'), date: e.getAttribute('onclick')});
    });
    return output;
  }, ooo);
}

casper.run(function() {
  fs.write("/var/web/crawler/resources/txt/output.txt", JSON.stringify(targets), "w");
  //this.echo(JSON.stringify(targets)).exit();
  this.exit();
});
