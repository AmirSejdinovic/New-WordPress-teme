const GulpClient = require("gulp");
import yargs from 'yargs';

const PRODUCTION = yargs.argv.prod;




function defaultTask(cb) {
  console.log('PRODUCTION');
  cb();
}

function amir(cb){
  console.log(PRODUCTION);
  cb();
}





exports.amir = amir;

exports.default = defaultTask

