collnetApp.factory("Institute", ['$http', function($http) {
  var serviceBase = '../api/';
  return {
    get: function (q) {
      return $http.get(serviceBase + "?action=getInstitute&_id=" + q).then(function (results) {
        return results.data;
      });
    },
    getAll: function () {
      return $http.get(serviceBase + "?action=getAllInstitutes").then(function (results) {
        return results.data;
      });
    },
    getStudentsOf : function(q) {
      return $http.get(serviceBase + "?action=studentsOf&_id=" + q).then(function (results) {
        return results.data;
      });
    },
    search: function (q) {
      return $http.get(serviceBase + "?action=getInstitute&keyword=" + q).then(function (results) {
        return results.data;
      });
    },
    enroll: function (object) {
      return $http.post(serviceBase + "?action=enroll", object).then(function (results) {
        return results.data;
      });
    },
    unenroll: function(object) {
      return $http.post(serviceBase + "?action=unenroll", object).then(function (results) {
        return results.data;
      });
    } 
  };
}]);
