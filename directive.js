/**
 *
 * * File: directive.js
 * Author: Jason Lu (jasonlu6@bu.edu)
 *
 * Collaboration:
 * Professor Douglas Densmore (dougd@bu.edu)
 * Marliene Pavan (mapavan@bu.edu)
 * Blade Olson (bladeols@bu.edu)
 * Christopher Rodriguez (Fluigi Lab)
 * Hector Plahar (ICE Software Developer at JBEI) (haplahar@lbl.gov)
 *
 *
 */

/* Source: https://stackoverflow.com/questions/31404502/
upload-multiple-files-in-angular */

var application = angular.module('ICEImports', []);

// main controller
application.controller('Main Control',function($scope) {
    $scope.name = 'ICE Sample Imports';
    // keep an empty list of files for accumulation
    $scope.files = [];
    $scope.uploadFiles = function () {
        alert($scope.files.length + "files selected.");
    };
});

// directive function to use NG model
application.directive('ngFileModel', ['$parse', function ($parse) {
    return {
        restrict: 'A',
        link: function (scope, element, attributes) {
            var model = $parse(attributes.ngFileModel);
            var isMultiple = attributes.multiple;
            var modelSetter = model.assign;
            element.bind('change', function() {
                // keep an empty list for the values
                var values = [];
                angular.forEach(element[0].files, function(item)
                {
                    var value = {
                        // File Name
                        name: item.name,
                        // File Size
                        size: item.size,
                        // File Type
                        type: item.type,
                        // File URL to view
                        url: URL.createObjectURL(item),
                        // File input value
                        _file: item
                    };
                    // push values onto the stack
                    values.push(value);

                });
            // apply onto the function
                scope.$apply(function () {
                    // multiple file selection
                    if (isMultiple) {
                        modelSetter(scope, values);
                    } else{
                        // single file selection
                        modelSetter(scope, values[0]);
                    }
                });
            });
        }
    };
}]);
