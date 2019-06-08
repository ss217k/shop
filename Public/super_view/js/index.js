(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);throw new Error("Cannot find module '"+o+"'")}var f=n[o]={exports:{}};t[o][0].call(f.exports,function(e){var n=t[o][1][e];return s(n?n:e)},f,f.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
/**
 * @license AngularJS v1.5.8
 * (c) 2010-2016 Google, Inc. http://angularjs.org
 * License: MIT
 */
(function(window, angular) {'use strict';

/* global shallowCopy: true */

/**
 * Creates a shallow copy of an object, an array or a primitive.
 *
 * Assumes that there are no proto properties for objects.
 */
function shallowCopy(src, dst) {
  if (isArray(src)) {
    dst = dst || [];

    for (var i = 0, ii = src.length; i < ii; i++) {
      dst[i] = src[i];
    }
  } else if (isObject(src)) {
    dst = dst || {};

    for (var key in src) {
      if (!(key.charAt(0) === '$' && key.charAt(1) === '$')) {
        dst[key] = src[key];
      }
    }
  }

  return dst || src;
}

/* global shallowCopy: false */

// There are necessary for `shallowCopy()` (included via `src/shallowCopy.js`).
// They are initialized inside the `$RouteProvider`, to ensure `window.angular` is available.
var isArray;
var isObject;

/**
 * @ngdoc module
 * @name ngRoute
 * @description
 *
 * # ngRoutek
 *
 * The `ngRoute` module provides routing and deeplinking services and directives for angular apps.
 *
 * ## Example
 * See {@link ngRoute.$route#example $route} for an example of configuring and using `ngRoute`.
 *
 *
 * <div doc-module-components="ngRoute"></div>
 */
 /* global -ngRouteModule */
var ngRouteModule = angular.module('ngRoute', ['ng']).
                        provider('$route', $RouteProvider),
    $routeMinErr = angular.$$minErr('ngRoute');

/**
 * @ngdoc provider
 * @name $routeProvider
 *
 * @description
 *
 * Used for configuring routes.
 *
 * ## Example
 * See {@link ngRoute.$route#example $route} for an example of configuring and using `ngRoute`.
 *
 * ## Dependencies
 * Requires the {@link ngRoute `ngRoute`} module to be installed.
 */
function $RouteProvider() {
  isArray = angular.isArray;
  isObject = angular.isObject;

  function inherit(parent, extra) {
    return angular.extend(Object.create(parent), extra);
  }

  var routes = {};

  /**
   * @ngdoc method
   * @name $routeProvider#when
   *
   * @param {string} path Route path (matched against `$location.path`). If `$location.path`
   *    contains redundant trailing slash or is missing one, the route will still match and the
   *    `$location.path` will be updated to add or drop the trailing slash to exactly match the
   *    route definition.
   *
   *    * `path` can contain named groups starting with a colon: e.g. `:name`. All characters up
   *        to the next slash are matched and stored in `$routeParams` under the given `name`
   *        when the route matches.
   *    * `path` can contain named groups starting with a colon and ending with a star:
   *        e.g.`:name*`. All characters are eagerly stored in `$routeParams` under the given `name`
   *        when the route matches.
   *    * `path` can contain optional named groups with a question mark: e.g.`:name?`.
   *
   *    For example, routes like `/color/:color/largecode/:largecode*\/edit` will match
   *    `/color/brown/largecode/code/with/slashes/edit` and extract:
   *
   *    * `color: brown`
   *    * `largecode: code/with/slashes`.
   *
   *
   * @param {Object} route Mapping information to be assigned to `$route.current` on route
   *    match.
   *
   *    Object properties:
   *
   *    - `controller` – `{(string|function()=}` – Controller fn that should be associated with
   *      newly created scope or the name of a {@link angular.Module#controller registered
   *      controller} if passed as a string.
   *    - `controllerAs` – `{string=}` – An identifier name for a reference to the controller.
   *      If present, the controller will be published to scope under the `controllerAs` name.
   *    - `template` – `{string=|function()=}` – html template as a string or a function that
   *      returns an html template as a string which should be used by {@link
   *      ngRoute.directive:ngView ngView} or {@link ng.directive:ngInclude ngInclude} directives.
   *      This property takes precedence over `templateUrl`.
   *
   *      If `template` is a function, it will be called with the following parameters:
   *
   *      - `{Array.<Object>}` - route parameters extracted from the current
   *        `$location.path()` by applying the current route
   *
   *    - `templateUrl` – `{string=|function()=}` – path or function that returns a path to an html
   *      template that should be used by {@link ngRoute.directive:ngView ngView}.
   *
   *      If `templateUrl` is a function, it will be called with the following parameters:
   *
   *      - `{Array.<Object>}` - route parameters extracted from the current
   *        `$location.path()` by applying the current route
   *
   *    - `resolve` - `{Object.<string, function>=}` - An optional map of dependencies which should
   *      be injected into the controller. If any of these dependencies are promises, the router
   *      will wait for them all to be resolved or one to be rejected before the controller is
   *      instantiated.
   *      If all the promises are resolved successfully, the values of the resolved promises are
   *      injected and {@link ngRoute.$route#$routeChangeSuccess $routeChangeSuccess} event is
   *      fired. If any of the promises are rejected the
   *      {@link ngRoute.$route#$routeChangeError $routeChangeError} event is fired.
   *      For easier access to the resolved dependencies from the template, the `resolve` map will
   *      be available on the scope of the route, under `$resolve` (by default) or a custom name
   *      specified by the `resolveAs` property (see below). This can be particularly useful, when
   *      working with {@link angular.Module#component components} as route templates.<br />
   *      <div class="alert alert-warning">
   *        **Note:** If your scope already contains a property with this name, it will be hidden
   *        or overwritten. Make sure, you specify an appropriate name for this property, that
   *        does not collide with other properties on the scope.
   *      </div>
   *      The map object is:
   *
   *      - `key` – `{string}`: a name of a dependency to be injected into the controller.
   *      - `factory` - `{string|function}`: If `string` then it is an alias for a service.
   *        Otherwise if function, then it is {@link auto.$injector#invoke injected}
   *        and the return value is treated as the dependency. If the result is a promise, it is
   *        resolved before its value is injected into the controller. Be aware that
   *        `ngRoute.$routeParams` will still refer to the previous route within these resolve
   *        functions.  Use `$route.current.params` to access the new route parameters, instead.
   *
   *    - `resolveAs` - `{string=}` - The name under which the `resolve` map will be available on
   *      the scope of the route. If omitted, defaults to `$resolve`.
   *
   *    - `redirectTo` – `{(string|function())=}` – value to update
   *      {@link ng.$location $location} path with and trigger route redirection.
   *
   *      If `redirectTo` is a function, it will be called with the following parameters:
   *
   *      - `{Object.<string>}` - route parameters extracted from the current
   *        `$location.path()` by applying the current route templateUrl.
   *      - `{string}` - current `$location.path()`
   *      - `{Object}` - current `$location.search()`
   *
   *      The custom `redirectTo` function is expected to return a string which will be used
   *      to update `$location.path()` and `$location.search()`.
   *
   *    - `[reloadOnSearch=true]` - `{boolean=}` - reload route when only `$location.search()`
   *      or `$location.hash()` changes.
   *
   *      If the option is set to `false` and url in the browser changes, then
   *      `$routeUpdate` event is broadcasted on the root scope.
   *
   *    - `[caseInsensitiveMatch=false]` - `{boolean=}` - match routes without being case sensitive
   *
   *      If the option is set to `true`, then the particular route can be matched without being
   *      case sensitive
   *
   * @returns {Object} self
   *
   * @description
   * Adds a new route definition to the `$route` service.
   */
  this.when = function(path, route) {
    //copy original route object to preserve params inherited from proto chain
    var routeCopy = shallowCopy(route);
    if (angular.isUndefined(routeCopy.reloadOnSearch)) {
      routeCopy.reloadOnSearch = true;
    }
    if (angular.isUndefined(routeCopy.caseInsensitiveMatch)) {
      routeCopy.caseInsensitiveMatch = this.caseInsensitiveMatch;
    }
    routes[path] = angular.extend(
      routeCopy,
      path && pathRegExp(path, routeCopy)
    );

    // create redirection for trailing slashes
    if (path) {
      var redirectPath = (path[path.length - 1] == '/')
            ? path.substr(0, path.length - 1)
            : path + '/';

      routes[redirectPath] = angular.extend(
        {redirectTo: path},
        pathRegExp(redirectPath, routeCopy)
      );
    }

    return this;
  };

  /**
   * @ngdoc property
   * @name $routeProvider#caseInsensitiveMatch
   * @description
   *
   * A boolean property indicating if routes defined
   * using this provider should be matched using a case insensitive
   * algorithm. Defaults to `false`.
   */
  this.caseInsensitiveMatch = false;

   /**
    * @param path {string} path
    * @param opts {Object} options
    * @return {?Object}
    *
    * @description
    * Normalizes the given path, returning a regular expression
    * and the original path.
    *
    * Inspired by pathRexp in visionmedia/express/lib/utils.js.
    */
  function pathRegExp(path, opts) {
    var insensitive = opts.caseInsensitiveMatch,
        ret = {
          originalPath: path,
          regexp: path
        },
        keys = ret.keys = [];

    path = path
      .replace(/([().])/g, '\\$1')
      .replace(/(\/)?:(\w+)(\*\?|[\?\*])?/g, function(_, slash, key, option) {
        var optional = (option === '?' || option === '*?') ? '?' : null;
        var star = (option === '*' || option === '*?') ? '*' : null;
        keys.push({ name: key, optional: !!optional });
        slash = slash || '';
        return ''
          + (optional ? '' : slash)
          + '(?:'
          + (optional ? slash : '')
          + (star && '(.+?)' || '([^/]+)')
          + (optional || '')
          + ')'
          + (optional || '');
      })
      .replace(/([\/$\*])/g, '\\$1');

    ret.regexp = new RegExp('^' + path + '$', insensitive ? 'i' : '');
    return ret;
  }

  /**
   * @ngdoc method
   * @name $routeProvider#otherwise
   *
   * @description
   * Sets route definition that will be used on route change when no other route definition
   * is matched.
   *
   * @param {Object|string} params Mapping information to be assigned to `$route.current`.
   * If called with a string, the value maps to `redirectTo`.
   * @returns {Object} self
   */
  this.otherwise = function(params) {
    if (typeof params === 'string') {
      params = {redirectTo: params};
    }
    this.when(null, params);
    return this;
  };


  this.$get = ['$rootScope',
               '$location',
               '$routeParams',
               '$q',
               '$injector',
               '$templateRequest',
               '$sce',
      function($rootScope, $location, $routeParams, $q, $injector, $templateRequest, $sce) {

    /**
     * @ngdoc service
     * @name $route
     * @requires $location
     * @requires $routeParams
     *
     * @property {Object} current Reference to the current route definition.
     * The route definition contains:
     *
     *   - `controller`: The controller constructor as defined in the route definition.
     *   - `locals`: A map of locals which is used by {@link ng.$controller $controller} service for
     *     controller instantiation. The `locals` contain
     *     the resolved values of the `resolve` map. Additionally the `locals` also contain:
     *
     *     - `$scope` - The current route scope.
     *     - `$template` - The current route template HTML.
     *
     *     The `locals` will be assigned to the route scope's `$resolve` property. You can override
     *     the property name, using `resolveAs` in the route definition. See
     *     {@link ngRoute.$routeProvider $routeProvider} for more info.
     *
     * @property {Object} routes Object with all route configuration Objects as its properties.
     *
     * @description
     * `$route` is used for deep-linking URLs to controllers and views (HTML partials).
     * It watches `$location.url()` and tries to map the path to an existing route definition.
     *
     * Requires the {@link ngRoute `ngRoute`} module to be installed.
     *
     * You can define routes through {@link ngRoute.$routeProvider $routeProvider}'s API.
     *
     * The `$route` service is typically used in conjunction with the
     * {@link ngRoute.directive:ngView `ngView`} directive and the
     * {@link ngRoute.$routeParams `$routeParams`} service.
     *
     * @example
     * This example shows how changing the URL hash causes the `$route` to match a route against the
     * URL, and the `ngView` pulls in the partial.
     *
     * <example name="$route-service" module="ngRouteExample"
     *          deps="angular-route.js" fixBase="true">
     *   <file name="index.html">
     *     <div ng-controller="MainController">
     *       Choose:
     *       <a href="Book/Moby">Moby</a> |
     *       <a href="Book/Moby/ch/1">Moby: Ch1</a> |
     *       <a href="Book/Gatsby">Gatsby</a> |
     *       <a href="Book/Gatsby/ch/4?key=value">Gatsby: Ch4</a> |
     *       <a href="Book/Scarlet">Scarlet Letter</a><br/>
     *
     *       <div ng-view></div>
     *
     *       <hr />
     *
     *       <pre>$location.path() = {{$location.path()}}</pre>
     *       <pre>$route.current.templateUrl = {{$route.current.templateUrl}}</pre>
     *       <pre>$route.current.params = {{$route.current.params}}</pre>
     *       <pre>$route.current.scope.name = {{$route.current.scope.name}}</pre>
     *       <pre>$routeParams = {{$routeParams}}</pre>
     *     </div>
     *   </file>
     *
     *   <file name="book.html">
     *     controller: {{name}}<br />
     *     Book Id: {{params.bookId}}<br />
     *   </file>
     *
     *   <file name="chapter.html">
     *     controller: {{name}}<br />
     *     Book Id: {{params.bookId}}<br />
     *     Chapter Id: {{params.chapterId}}
     *   </file>
     *
     *   <file name="script.js">
     *     angular.module('ngRouteExample', ['ngRoute'])
     *
     *      .controller('MainController', function($scope, $route, $routeParams, $location) {
     *          $scope.$route = $route;
     *          $scope.$location = $location;
     *          $scope.$routeParams = $routeParams;
     *      })
     *
     *      .controller('BookController', function($scope, $routeParams) {
     *          $scope.name = "BookController";
     *          $scope.params = $routeParams;
     *      })
     *
     *      .controller('ChapterController', function($scope, $routeParams) {
     *          $scope.name = "ChapterController";
     *          $scope.params = $routeParams;
     *      })
     *
     *     .config(function($routeProvider, $locationProvider) {
     *       $routeProvider
     *        .when('/Book/:bookId', {
     *         templateUrl: 'book.html',
     *         controller: 'BookController',
     *         resolve: {
     *           // I will cause a 1 second delay
     *           delay: function($q, $timeout) {
     *             var delay = $q.defer();
     *             $timeout(delay.resolve, 1000);
     *             return delay.promise;
     *           }
     *         }
     *       })
     *       .when('/Book/:bookId/ch/:chapterId', {
     *         templateUrl: 'chapter.html',
     *         controller: 'ChapterController'
     *       });
     *
     *       // configure html5 to get links working on jsfiddle
     *       $locationProvider.html5Mode(true);
     *     });
     *
     *   </file>
     *
     *   <file name="protractor.js" type="protractor">
     *     it('should load and compile correct template', function() {
     *       element(by.linkText('Moby: Ch1')).click();
     *       var content = element(by.css('[ng-view]')).getText();
     *       expect(content).toMatch(/controller\: ChapterController/);
     *       expect(content).toMatch(/Book Id\: Moby/);
     *       expect(content).toMatch(/Chapter Id\: 1/);
     *
     *       element(by.partialLinkText('Scarlet')).click();
     *
     *       content = element(by.css('[ng-view]')).getText();
     *       expect(content).toMatch(/controller\: BookController/);
     *       expect(content).toMatch(/Book Id\: Scarlet/);
     *     });
     *   </file>
     * </example>
     */

    /**
     * @ngdoc event
     * @name $route#$routeChangeStart
     * @eventType broadcast on root scope
     * @description
     * Broadcasted before a route change. At this  point the route services starts
     * resolving all of the dependencies needed for the route change to occur.
     * Typically this involves fetching the view template as well as any dependencies
     * defined in `resolve` route property. Once  all of the dependencies are resolved
     * `$routeChangeSuccess` is fired.
     *
     * The route change (and the `$location` change that triggered it) can be prevented
     * by calling `preventDefault` method of the event. See {@link ng.$rootScope.Scope#$on}
     * for more details about event object.
     *
     * @param {Object} angularEvent Synthetic event object.
     * @param {Route} next Future route information.
     * @param {Route} current Current route information.
     */

    /**
     * @ngdoc event
     * @name $route#$routeChangeSuccess
     * @eventType broadcast on root scope
     * @description
     * Broadcasted after a route change has happened successfully.
     * The `resolve` dependencies are now available in the `current.locals` property.
     *
     * {@link ngRoute.directive:ngView ngView} listens for the directive
     * to instantiate the controller and render the view.
     *
     * @param {Object} angularEvent Synthetic event object.
     * @param {Route} current Current route information.
     * @param {Route|Undefined} previous Previous route information, or undefined if current is
     * first route entered.
     */

    /**
     * @ngdoc event
     * @name $route#$routeChangeError
     * @eventType broadcast on root scope
     * @description
     * Broadcasted if any of the resolve promises are rejected.
     *
     * @param {Object} angularEvent Synthetic event object
     * @param {Route} current Current route information.
     * @param {Route} previous Previous route information.
     * @param {Route} rejection Rejection of the promise. Usually the error of the failed promise.
     */

    /**
     * @ngdoc event
     * @name $route#$routeUpdate
     * @eventType broadcast on root scope
     * @description
     * The `reloadOnSearch` property has been set to false, and we are reusing the same
     * instance of the Controller.
     *
     * @param {Object} angularEvent Synthetic event object
     * @param {Route} current Current/previous route information.
     */

    var forceReload = false,
        preparedRoute,
        preparedRouteIsUpdateOnly,
        $route = {
          routes: routes,

          /**
           * @ngdoc method
           * @name $route#reload
           *
           * @description
           * Causes `$route` service to reload the current route even if
           * {@link ng.$location $location} hasn't changed.
           *
           * As a result of that, {@link ngRoute.directive:ngView ngView}
           * creates new scope and reinstantiates the controller.
           */
          reload: function() {
            forceReload = true;

            var fakeLocationEvent = {
              defaultPrevented: false,
              preventDefault: function fakePreventDefault() {
                this.defaultPrevented = true;
                forceReload = false;
              }
            };

            $rootScope.$evalAsync(function() {
              prepareRoute(fakeLocationEvent);
              if (!fakeLocationEvent.defaultPrevented) commitRoute();
            });
          },

          /**
           * @ngdoc method
           * @name $route#updateParams
           *
           * @description
           * Causes `$route` service to update the current URL, replacing
           * current route parameters with those specified in `newParams`.
           * Provided property names that match the route's path segment
           * definitions will be interpolated into the location's path, while
           * remaining properties will be treated as query params.
           *
           * @param {!Object<string, string>} newParams mapping of URL parameter names to values
           */
          updateParams: function(newParams) {
            if (this.current && this.current.$$route) {
              newParams = angular.extend({}, this.current.params, newParams);
              $location.path(interpolate(this.current.$$route.originalPath, newParams));
              // interpolate modifies newParams, only query params are left
              $location.search(newParams);
            } else {
              throw $routeMinErr('norout', 'Tried updating route when with no current route');
            }
          }
        };

    $rootScope.$on('$locationChangeStart', prepareRoute);
    $rootScope.$on('$locationChangeSuccess', commitRoute);

    return $route;

    /////////////////////////////////////////////////////

    /**
     * @param on {string} current url
     * @param route {Object} route regexp to match the url against
     * @return {?Object}
     *
     * @description
     * Check if the route matches the current url.
     *
     * Inspired by match in
     * visionmedia/express/lib/router/router.js.
     */
    function switchRouteMatcher(on, route) {
      var keys = route.keys,
          params = {};

      if (!route.regexp) return null;

      var m = route.regexp.exec(on);
      if (!m) return null;

      for (var i = 1, len = m.length; i < len; ++i) {
        var key = keys[i - 1];

        var val = m[i];

        if (key && val) {
          params[key.name] = val;
        }
      }
      return params;
    }

    function prepareRoute($locationEvent) {
      var lastRoute = $route.current;

      preparedRoute = parseRoute();
      preparedRouteIsUpdateOnly = preparedRoute && lastRoute && preparedRoute.$$route === lastRoute.$$route
          && angular.equals(preparedRoute.pathParams, lastRoute.pathParams)
          && !preparedRoute.reloadOnSearch && !forceReload;

      if (!preparedRouteIsUpdateOnly && (lastRoute || preparedRoute)) {
        if ($rootScope.$broadcast('$routeChangeStart', preparedRoute, lastRoute).defaultPrevented) {
          if ($locationEvent) {
            $locationEvent.preventDefault();
          }
        }
      }
    }

    function commitRoute() {
      var lastRoute = $route.current;
      var nextRoute = preparedRoute;

      if (preparedRouteIsUpdateOnly) {
        lastRoute.params = nextRoute.params;
        angular.copy(lastRoute.params, $routeParams);
        $rootScope.$broadcast('$routeUpdate', lastRoute);
      } else if (nextRoute || lastRoute) {
        forceReload = false;
        $route.current = nextRoute;
        if (nextRoute) {
          if (nextRoute.redirectTo) {
            if (angular.isString(nextRoute.redirectTo)) {
              $location.path(interpolate(nextRoute.redirectTo, nextRoute.params)).search(nextRoute.params)
                       .replace();
            } else {
              $location.url(nextRoute.redirectTo(nextRoute.pathParams, $location.path(), $location.search()))
                       .replace();
            }
          }
        }

        $q.when(nextRoute).
          then(resolveLocals).
          then(function(locals) {
            // after route change
            if (nextRoute == $route.current) {
              if (nextRoute) {
                nextRoute.locals = locals;
                angular.copy(nextRoute.params, $routeParams);
              }
              $rootScope.$broadcast('$routeChangeSuccess', nextRoute, lastRoute);
            }
          }, function(error) {
            if (nextRoute == $route.current) {
              $rootScope.$broadcast('$routeChangeError', nextRoute, lastRoute, error);
            }
          });
      }
    }

    function resolveLocals(route) {
      if (route) {
        var locals = angular.extend({}, route.resolve);
        angular.forEach(locals, function(value, key) {
          locals[key] = angular.isString(value) ?
              $injector.get(value) :
              $injector.invoke(value, null, null, key);
        });
        var template = getTemplateFor(route);
        if (angular.isDefined(template)) {
          locals['$template'] = template;
        }
        return $q.all(locals);
      }
    }


    function getTemplateFor(route) {
      var template, templateUrl;
      if (angular.isDefined(template = route.template)) {
        if (angular.isFunction(template)) {
          template = template(route.params);
        }
      } else if (angular.isDefined(templateUrl = route.templateUrl)) {
        if (angular.isFunction(templateUrl)) {
          templateUrl = templateUrl(route.params);
        }
        if (angular.isDefined(templateUrl)) {
          route.loadedTemplateUrl = $sce.valueOf(templateUrl);
          template = $templateRequest(templateUrl);
        }
      }
      return template;
    }


    /**
     * @returns {Object} the current active route, by matching it against the URL
     */
    function parseRoute() {
      // Match a route
      var params, match;
      angular.forEach(routes, function(route, path) {
        if (!match && (params = switchRouteMatcher($location.path(), route))) {
          match = inherit(route, {
            params: angular.extend({}, $location.search(), params),
            pathParams: params});
          match.$$route = route;
        }
      });
      // No route matched; fallback to "otherwise" route
      return match || routes[null] && inherit(routes[null], {params: {}, pathParams:{}});
    }

    /**
     * @returns {string} interpolation of the redirect path with the parameters
     */
    function interpolate(string, params) {
      var result = [];
      angular.forEach((string || '').split(':'), function(segment, i) {
        if (i === 0) {
          result.push(segment);
        } else {
          var segmentMatch = segment.match(/(\w+)(?:[?*])?(.*)/);
          var key = segmentMatch[1];
          result.push(params[key]);
          result.push(segmentMatch[2] || '');
          delete params[key];
        }
      });
      return result.join('');
    }
  }];
}

ngRouteModule.provider('$routeParams', $RouteParamsProvider);


/**
 * @ngdoc service
 * @name $routeParams
 * @requires $route
 *
 * @description
 * The `$routeParams` service allows you to retrieve the current set of route parameters.
 *
 * Requires the {@link ngRoute `ngRoute`} module to be installed.
 *
 * The route parameters are a combination of {@link ng.$location `$location`}'s
 * {@link ng.$location#search `search()`} and {@link ng.$location#path `path()`}.
 * The `path` parameters are extracted when the {@link ngRoute.$route `$route`} path is matched.
 *
 * In case of parameter name collision, `path` params take precedence over `search` params.
 *
 * The service guarantees that the identity of the `$routeParams` object will remain unchanged
 * (but its properties will likely change) even when a route change occurs.
 *
 * Note that the `$routeParams` are only updated *after* a route change completes successfully.
 * This means that you cannot rely on `$routeParams` being correct in route resolve functions.
 * Instead you can use `$route.current.params` to access the new route's parameters.
 *
 * @example
 * ```js
 *  // Given:
 *  // URL: http://server.com/index.html#/Chapter/1/Section/2?search=moby
 *  // Route: /Chapter/:chapterId/Section/:sectionId
 *  //
 *  // Then
 *  $routeParams ==> {chapterId:'1', sectionId:'2', search:'moby'}
 * ```
 */
function $RouteParamsProvider() {
  this.$get = function() { return {}; };
}

ngRouteModule.directive('ngView', ngViewFactory);
ngRouteModule.directive('ngView', ngViewFillContentFactory);


/**
 * @ngdoc directive
 * @name ngView
 * @restrict ECA
 *
 * @description
 * # Overview
 * `ngView` is a directive that complements the {@link ngRoute.$route $route} service by
 * including the rendered template of the current route into the main layout (`index.html`) file.
 * Every time the current route changes, the included view changes with it according to the
 * configuration of the `$route` service.
 *
 * Requires the {@link ngRoute `ngRoute`} module to be installed.
 *
 * @animations
 * | Animation                        | Occurs                              |
 * |----------------------------------|-------------------------------------|
 * | {@link ng.$animate#enter enter}  | when the new element is inserted to the DOM |
 * | {@link ng.$animate#leave leave}  | when the old element is removed from to the DOM  |
 *
 * The enter and leave animation occur concurrently.
 *
 * @knownIssue If `ngView` is contained in an asynchronously loaded template (e.g. in another
 *             directive's templateUrl or in a template loaded using `ngInclude`), then you need to
 *             make sure that `$route` is instantiated in time to capture the initial
 *             `$locationChangeStart` event and load the appropriate view. One way to achieve this
 *             is to have it as a dependency in a `.run` block:
 *             `myModule.run(['$route', function() {}]);`
 *
 * @scope
 * @priority 400
 * @param {string=} onload Expression to evaluate whenever the view updates.
 *
 * @param {string=} autoscroll Whether `ngView` should call {@link ng.$anchorScroll
 *                  $anchorScroll} to scroll the viewport after the view is updated.
 *
 *                  - If the attribute is not set, disable scrolling.
 *                  - If the attribute is set without value, enable scrolling.
 *                  - Otherwise enable scrolling only if the `autoscroll` attribute value evaluated
 *                    as an expression yields a truthy value.
 * @example
    <example name="ngView-directive" module="ngViewExample"
             deps="angular-route.js;angular-animate.js"
             animations="true" fixBase="true">
      <file name="index.html">
        <div ng-controller="MainCtrl as main">
          Choose:
          <a href="Book/Moby">Moby</a> |
          <a href="Book/Moby/ch/1">Moby: Ch1</a> |
          <a href="Book/Gatsby">Gatsby</a> |
          <a href="Book/Gatsby/ch/4?key=value">Gatsby: Ch4</a> |
          <a href="Book/Scarlet">Scarlet Letter</a><br/>

          <div class="view-animate-container">
            <div ng-view class="view-animate"></div>
          </div>
          <hr />

          <pre>$location.path() = {{main.$location.path()}}</pre>
          <pre>$route.current.templateUrl = {{main.$route.current.templateUrl}}</pre>
          <pre>$route.current.params = {{main.$route.current.params}}</pre>
          <pre>$routeParams = {{main.$routeParams}}</pre>
        </div>
      </file>

      <file name="book.html">
        <div>
          controller: {{book.name}}<br />
          Book Id: {{book.params.bookId}}<br />
        </div>
      </file>

      <file name="chapter.html">
        <div>
          controller: {{chapter.name}}<br />
          Book Id: {{chapter.params.bookId}}<br />
          Chapter Id: {{chapter.params.chapterId}}
        </div>
      </file>

      <file name="animations.css">
        .view-animate-container {
          position:relative;
          height:100px!important;
          background:white;
          border:1px solid black;
          height:40px;
          overflow:hidden;
        }

        .view-animate {
          padding:10px;
        }

        .view-animate.ng-enter, .view-animate.ng-leave {
          transition:all cubic-bezier(0.250, 0.460, 0.450, 0.940) 1.5s;

          display:block;
          width:100%;
          border-left:1px solid black;

          position:absolute;
          top:0;
          left:0;
          right:0;
          bottom:0;
          padding:10px;
        }

        .view-animate.ng-enter {
          left:100%;
        }
        .view-animate.ng-enter.ng-enter-active {
          left:0;
        }
        .view-animate.ng-leave.ng-leave-active {
          left:-100%;
        }
      </file>

      <file name="script.js">
        angular.module('ngViewExample', ['ngRoute', 'ngAnimate'])
          .config(['$routeProvider', '$locationProvider',
            function($routeProvider, $locationProvider) {
              $routeProvider
                .when('/Book/:bookId', {
                  templateUrl: 'book.html',
                  controller: 'BookCtrl',
                  controllerAs: 'book'
                })
                .when('/Book/:bookId/ch/:chapterId', {
                  templateUrl: 'chapter.html',
                  controller: 'ChapterCtrl',
                  controllerAs: 'chapter'
                });

              $locationProvider.html5Mode(true);
          }])
          .controller('MainCtrl', ['$route', '$routeParams', '$location',
            function($route, $routeParams, $location) {
              this.$route = $route;
              this.$location = $location;
              this.$routeParams = $routeParams;
          }])
          .controller('BookCtrl', ['$routeParams', function($routeParams) {
            this.name = "BookCtrl";
            this.params = $routeParams;
          }])
          .controller('ChapterCtrl', ['$routeParams', function($routeParams) {
            this.name = "ChapterCtrl";
            this.params = $routeParams;
          }]);

      </file>

      <file name="protractor.js" type="protractor">
        it('should load and compile correct template', function() {
          element(by.linkText('Moby: Ch1')).click();
          var content = element(by.css('[ng-view]')).getText();
          expect(content).toMatch(/controller\: ChapterCtrl/);
          expect(content).toMatch(/Book Id\: Moby/);
          expect(content).toMatch(/Chapter Id\: 1/);

          element(by.partialLinkText('Scarlet')).click();

          content = element(by.css('[ng-view]')).getText();
          expect(content).toMatch(/controller\: BookCtrl/);
          expect(content).toMatch(/Book Id\: Scarlet/);
        });
      </file>
    </example>
 */


/**
 * @ngdoc event
 * @name ngView#$viewContentLoaded
 * @eventType emit on the current ngView scope
 * @description
 * Emitted every time the ngView content is reloaded.
 */
ngViewFactory.$inject = ['$route', '$anchorScroll', '$animate'];
function ngViewFactory($route, $anchorScroll, $animate) {
  return {
    restrict: 'ECA',
    terminal: true,
    priority: 400,
    transclude: 'element',
    link: function(scope, $element, attr, ctrl, $transclude) {
        var currentScope,
            currentElement,
            previousLeaveAnimation,
            autoScrollExp = attr.autoscroll,
            onloadExp = attr.onload || '';

        scope.$on('$routeChangeSuccess', update);
        update();

        function cleanupLastView() {
          if (previousLeaveAnimation) {
            $animate.cancel(previousLeaveAnimation);
            previousLeaveAnimation = null;
          }

          if (currentScope) {
            currentScope.$destroy();
            currentScope = null;
          }
          if (currentElement) {
            previousLeaveAnimation = $animate.leave(currentElement);
            previousLeaveAnimation.then(function() {
              previousLeaveAnimation = null;
            });
            currentElement = null;
          }
        }

        function update() {
          var locals = $route.current && $route.current.locals,
              template = locals && locals.$template;

          if (angular.isDefined(template)) {
            var newScope = scope.$new();
            var current = $route.current;

            // Note: This will also link all children of ng-view that were contained in the original
            // html. If that content contains controllers, ... they could pollute/change the scope.
            // However, using ng-view on an element with additional content does not make sense...
            // Note: We can't remove them in the cloneAttchFn of $transclude as that
            // function is called before linking the content, which would apply child
            // directives to non existing elements.
            var clone = $transclude(newScope, function(clone) {
              $animate.enter(clone, null, currentElement || $element).then(function onNgViewEnter() {
                if (angular.isDefined(autoScrollExp)
                  && (!autoScrollExp || scope.$eval(autoScrollExp))) {
                  $anchorScroll();
                }
              });
              cleanupLastView();
            });

            currentElement = clone;
            currentScope = current.scope = newScope;
            currentScope.$emit('$viewContentLoaded');
            currentScope.$eval(onloadExp);
          } else {
            cleanupLastView();
          }
        }
    }
  };
}

// This directive is called during the $transclude call of the first `ngView` directive.
// It will replace and compile the content of the element with the loaded template.
// We need this directive so that the element content is already filled when
// the link function of another directive on the same element as ngView
// is called.
ngViewFillContentFactory.$inject = ['$compile', '$controller', '$route'];
function ngViewFillContentFactory($compile, $controller, $route) {
  return {
    restrict: 'ECA',
    priority: -400,
    link: function(scope, $element) {
      var current = $route.current,
          locals = current.locals;

      $element.html(locals.$template);

      var link = $compile($element.contents());

      if (current.controller) {
        locals.$scope = scope;
        var controller = $controller(current.controller, locals);
        if (current.controllerAs) {
          scope[current.controllerAs] = controller;
        }
        $element.data('$ngControllerController', controller);
        $element.children().data('$ngControllerController', controller);
      }
      scope[current.resolveAs || '$resolve'] = locals;

      link(scope);
    }
  };
}


})(window, window.angular);

},{}],2:[function(require,module,exports){
require('./angular-route');
module.exports = 'ngRoute';

},{"./angular-route":1}],3:[function(require,module,exports){
/*
* @Author: slr
* @Date:   2016-06-03 16:34:34
* @Last modified by:   slr
* @Last modified time: 2016-11-28T16:01:17+08:00
*/

'use strict';
module.exports =  {
    buildingList: [
        {id: '000001', name: '公共教学一楼'},
        {id: '000002', name: '公共教学二楼'},
        {id: '000003', name: '公共教学三楼'},
        {id: '000041', name: '公共教学四楼'},
        {id: '000004', name: '求是楼'},
        {id: '000036', name: '国学楼'},
        {id: '000005', name: '明德主楼'},
        {id: '000006', name: '明德商学楼'},
        {id: '000007', name: '明德法学楼'},
        {id: '000015', name: '明德国际楼'},
        {id: '000016', name: '明德新闻楼'},
        {id: '000017', name: '明德地下广场'}
    ],
    roomTypeList: [
        {id: '01', name: '普通多媒体教室'},
        {id: '03', name: '网络交互式机房'},
        {id: '02', name: '语音教室'}
    ],
    timeList: [
        {id: 1, name: "1-2节(8:00-9:30)"},
        {id: 2, name: "3-4节(10:00-11:30)"},
        {id: 3, name: "5-6节(12:00-13:30)"},
        {id: 4, name: "7-8节(14:00-15:30)"},
        {id: 5, name: "9-10节(16:00-17:30)"},
        {id: 6, name: "11-12节(18:00-19:30)"},
        {id: 7, name: "13-14节(19:40-21:10)"}
    ],
    weekdayList: [
        {id: 1, name: '一'},
        {id: 2, name: '二'},
        {id: 3, name: '三'},
        {id: 4, name: '四'},
        {id: 5, name: '五'},
        {id: 6, name: '六'},
        {id: 7, name: '日'}
    ]
}

},{}],4:[function(require,module,exports){
/*
* @Author: slr
* @Date:   2016-06-05 16:08:08
* @Last Modified by:   slr
* @Last Modified time: 2017-01-04 19:20:13
*/

'use strict';
var buildings = [{"bno":1,"bnum":"000001","bname":"公共教学一楼"},{"bno":2,"bnum":"000002","bname":"公共教学二楼"},{"bno":3,"bnum":"000003","bname":"公共教学三楼"},{"bno":41,"bnum":"000041","bname":"公共教学四楼"},{"bno":4,"bnum":"000004","bname":"求是楼"},{"bno":36,"bnum":"000036","bname":"国学楼"},{"bno":5,"bnum":"000005","bname":"明德主楼"},{"bno":6,"bnum":"000006","bname":"明德商学楼"},{"bno":7,"bnum":"000007","bname":"明德法学楼"},{"bno":15,"bnum":"000015","bname":"明德国际楼"},{"bno":16,"bnum":"000016","bname":"明德新闻楼"},{"bno":17,"bnum":"000017","bname":"明德地下广场"}];
var rooms = [null,[["000001000001","000001",1,"公共教学一楼","1101","1","01","多媒体教室","500","500","250"],["000001000002","000001",1,"公共教学一楼","1102","1","01","多媒体教室","300","300","150"],["000001000003","000001",1,"公共教学一楼","1104","1","06","活动桌椅","100","100","50"],["000001000005","000001",1,"公共教学一楼","1204","2","01","多媒体教室","150","150","75"],["000001000006","000001",1,"公共教学一楼","1205","2","01","多媒体教室","180","180","90"],["000001000007","000001",1,"公共教学一楼","1301","3","01","多媒体教室","180","180","90"],["000001000008","000001",1,"公共教学一楼","1302","3","01","多媒体教室","300","300","150"],["000001000009","000001",1,"公共教学一楼","1303","3","01","多媒体教室","180","180","90"],["000001000010","000001",1,"公共教学一楼","1304","3","01","多媒体教室","180","180","90"],["000001000011","000001",1,"公共教学一楼","1305","3","01","多媒体教室","180","180","90"],["000001000012","000001",1,"公共教学一楼","1402","4","01","多媒体教室","300","300","150"],["000001000013","000001",1,"公共教学一楼","1403","4","01","多媒体教室","180","180","90"],["000001000014","000001",1,"公共教学一楼","1404","4","01","多媒体教室","120","120","60"],["000001000015","000001",1,"公共教学一楼","1405","4","01","多媒体教室","120","120","60"],["000001000016","000001",1,"公共教学一楼","1406","4","01","多媒体教室","120","120","60"],["000001000017","000001",1,"公共教学一楼","1503","5","01","多媒体教室","180","180","90"],["000001000018","000001",1,"公共教学一楼","1504","5","01","多媒体教室","120","120","60"],["000001000019","000001",1,"公共教学一楼","1505","5","01","多媒体教室","120","120","60"],["000001000020","000001",1,"公共教学一楼","1506","5","01","多媒体教室","120","120","60"],["000001000021","000001",1,"公共教学一楼","1602","6","01","多媒体教室","300","300","150"],["000001000022","000001",1,"公共教学一楼","1603","6","01","多媒体教室","180","180","90"],["000001000023","000001",1,"公共教学一楼","1604","6","03","交互式","60","60","30"],["000001000024","000001",1,"公共教学一楼","1605","6","03","交互式","60","60","30"],["000001000025","000001",1,"公共教学一楼","1606","6","03","交互式","60","60","30"]],[["000002000001","000002",2,"公共教学二楼","2101","1","10","普通教室","148","148","74"],["000002000002","000002",2,"公共教学二楼","2102","1","10","普通教室","130","130","65"],["000002000003","000002",2,"公共教学二楼","2103","1","01","多媒体教室","36","36","18"],["000002000004","000002",2,"公共教学二楼","2104","1","01","多媒体教室","40","40","20"],["000002000005","000002",2,"公共教学二楼","2105","1","01","多媒体教室","40","40","20"],["000002000006","000002",2,"公共教学二楼","2106","1","01","多媒体教室","40","40","20"],["000002000007","000002",2,"公共教学二楼","2107","1","01","多媒体教室","38","38","19"],["000002000008","000002",2,"公共教学二楼","2108","1","01","多媒体教室","40","40","20"],["000002000009","000002",2,"公共教学二楼","2109","1","01","多媒体教室","92","92","46"],["000002000010","000002",2,"公共教学二楼","2110","1","01","多媒体教室","40","40","20"],["000002000011","000002",2,"公共教学二楼","2111","1","01","多媒体教室","40","40","20"],["000002000012","000002",2,"公共教学二楼","2112","1","01","多媒体教室","38","38","19"],["000002000013","000002",2,"公共教学二楼","2113","1","01","多媒体教室","40","40","20"],["000002000014","000002",2,"公共教学二楼","2114","1","01","多媒体教室","40","40","20"],["000002000015","000002",2,"公共教学二楼","2115","1","01","多媒体教室","84","84","42"],["000002000016","000002",2,"公共教学二楼","2116","1","01","多媒体教室","40","40","20"],["000002000017","000002",2,"公共教学二楼","2117","1","01","多媒体教室","40","40","20"],["000002000018","000002",2,"公共教学二楼","2118","1","01","多媒体教室","40","40","20"],["000002000019","000002",2,"公共教学二楼","2119","1","01","多媒体教室","96","96","48"],["000002000020","000002",2,"公共教学二楼","2121","1","01","多媒体教室","130","130","65"],["000002000021","000002",2,"公共教学二楼","2201","2","01","多媒体教室","40","40","20"],["000002000022","000002",2,"公共教学二楼","2202","2","01","多媒体教室","40","40","20"],["000002000023","000002",2,"公共教学二楼","2203","2","01","多媒体教室","40","40","20"],["000002000024","000002",2,"公共教学二楼","2204","2","01","多媒体教室","40","40","20"],["000002000025","000002",2,"公共教学二楼","2205","2","01","多媒体教室","40","40","20"],["000002000026","000002",2,"公共教学二楼","2206","2","01","多媒体教室","40","40","20"],["000002000027","000002",2,"公共教学二楼","2207","2","01","多媒体教室","40","40","20"],["000002000028","000002",2,"公共教学二楼","2208","2","01","多媒体教室","40","40","20"],["000002000029","000002",2,"公共教学二楼","2209","2","01","多媒体教室","40","40","20"],["000002000031","000002",2,"公共教学二楼","2211","2","01","多媒体教室","40","40","20"],["000002000032","000002",2,"公共教学二楼","2212","2","01","多媒体教室","40","40","20"],["000002000034","000002",2,"公共教学二楼","2214","2","01","多媒体教室","40","40","20"],["000002000035","000002",2,"公共教学二楼","2215","2","01","多媒体教室","40","40","20"],["000002000036","000002",2,"公共教学二楼","2216","2","01","多媒体教室","40","40","20"],["000002000037","000002",2,"公共教学二楼","2217","2","01","多媒体教室","40","40","20"],["000002000038","000002",2,"公共教学二楼","2218","2","01","多媒体教室","40","40","20"],["000002000039","000002",2,"公共教学二楼","2219","2","01","多媒体教室","40","40","20"],["000002000040","000002",2,"公共教学二楼","2220","2","01","多媒体教室","40","40","20"],["000002000041","000002",2,"公共教学二楼","2221","2","01","多媒体教室","88","88","44"],["000002000042","000002",2,"公共教学二楼","2301","3","01","多媒体教室","40","40","20"],["000002000043","000002",2,"公共教学二楼","2302","3","01","多媒体教室","40","40","20"],["000002000044","000002",2,"公共教学二楼","2303","3","01","多媒体教室","40","40","20"],["000002000045","000002",2,"公共教学二楼","2304","3","01","多媒体教室","40","40","20"],["000002000046","000002",2,"公共教学二楼","2305","3","01","多媒体教室","40","40","20"],["000002000047","000002",2,"公共教学二楼","2306","3","01","多媒体教室","40","40","20"],["000002000048","000002",2,"公共教学二楼","2307","3","01","多媒体教室","40","40","20"],["000002000049","000002",2,"公共教学二楼","2308","3","01","多媒体教室","40","40","20"],["000002000050","000002",2,"公共教学二楼","2309","3","01","多媒体教室","40","40","20"],["000002000051","000002",2,"公共教学二楼","2310","3","01","多媒体教室","40","40","20"],["000002000052","000002",2,"公共教学二楼","2311","3","01","多媒体教室","40","40","20"],["000002000053","000002",2,"公共教学二楼","2312","3","01","多媒体教室","40","40","20"],["000002000054","000002",2,"公共教学二楼","2313","3","01","多媒体教室","40","40","20"],["000002000055","000002",2,"公共教学二楼","2314","3","01","多媒体教室","40","40","20"],["000002000056","000002",2,"公共教学二楼","2315","3","01","多媒体教室","40","40","20"],["000002000057","000002",2,"公共教学二楼","2316","3","01","多媒体教室","40","40","20"],["000002000058","000002",2,"公共教学二楼","2317","3","01","多媒体教室","40","40","20"],["000002000059","000002",2,"公共教学二楼","2318","3","01","多媒体教室","40","40","20"],["000002000060","000002",2,"公共教学二楼","2319","3","01","多媒体教室","40","40","20"],["000002000061","000002",2,"公共教学二楼","2320","3","01","多媒体教室","40","40","20"],["000002000062","000002",2,"公共教学二楼","2321","3","01","多媒体教室","40","40","20"],["000002000063","000002",2,"公共教学二楼","2322","3","01","多媒体教室","40","40","20"],["000002000064","000002",2,"公共教学二楼","2401","4","01","多媒体教室","40","40","20"],["000002000065","000002",2,"公共教学二楼","2402","4","01","多媒体教室","40","40","20"],["000002000066","000002",2,"公共教学二楼","2403","4","01","多媒体教室","60","60","30"],["000002000067","000002",2,"公共教学二楼","2404","4","01","多媒体教室","40","40","20"],["000002000068","000002",2,"公共教学二楼","2405","4","01","多媒体教室","62","62","31"],["000002000069","000002",2,"公共教学二楼","2406","4","01","多媒体教室","40","40","20"],["000002000070","000002",2,"公共教学二楼","2407","4","01","多媒体教室","40","40","20"],["000002000071","000002",2,"公共教学二楼","2408","4","01","多媒体教室","40","40","20"],["000002000072","000002",2,"公共教学二楼","2409","4","01","多媒体教室","60","60","30"],["000002000073","000002",2,"公共教学二楼","2410","4","01","多媒体教室","40","40","20"],["000002000074","000002",2,"公共教学二楼","2411","4","01","多媒体教室","40","40","20"],["000002000075","000002",2,"公共教学二楼","2412","4","01","多媒体教室","40","40","20"],["000002000076","000002",2,"公共教学二楼","2413","4","01","多媒体教室","60","60","30"],["000002000077","000002",2,"公共教学二楼","2414","4","01","多媒体教室","40","40","20"],["000002000078","000002",2,"公共教学二楼","2415","4","01","多媒体教室","60","60","30"],["000002000079","000002",2,"公共教学二楼","2416","4","01","多媒体教室","40","40","20"],["000002000080","000002",2,"公共教学二楼","2417","4","01","多媒体教室","40","40","20"],["000002000081","000002",2,"公共教学二楼","2418","4","01","多媒体教室","40","40","20"],["000002000082","000002",2,"公共教学二楼","2419","4","01","多媒体教室","40","40","20"]],[["000003000001","000003",3,"公共教学三楼","3101","1","01","多媒体教室","300","300","150"],["000003000002","000003",3,"公共教学三楼","3102","1","01","多媒体教室","104","104","52"],["000003000003","000003",3,"公共教学三楼","3103","1","01","多媒体教室","104","104","52"],["000003000004","000003",3,"公共教学三楼","3104","1","01","多媒体教室","104","104","52"],["000003000005","000003",3,"公共教学三楼","3105","1","01","多媒体教室","104","104","52"],["000003000006","000003",3,"公共教学三楼","3106","1","01","多媒体教室","156","156","78"],["000003000049","000003",3,"公共教学三楼","3110","1","02","语音教室","40","40","40"],["000003000050","000003",3,"公共教学三楼","3111","1","02","语音教室","40","40","40"],["000003000007","000003",3,"公共教学三楼","3201","2","01","多媒体教室","300","300","150"],["000003000008","000003",3,"公共教学三楼","3202","2","01","多媒体教室","54","54","27"],["000003000009","000003",3,"公共教学三楼","3204","2","01","多媒体教室","104","104","52"],["000003000010","000003",3,"公共教学三楼","3205","2","01","多媒体教室","63","63","31"],["000003000011","000003",3,"公共教学三楼","3206","2","01","多媒体教室","104","104","52"],["000003000012","000003",3,"公共教学三楼","3207","2","01","多媒体教室","156","156","78"],["000003000047","000003",3,"公共教学三楼","3210","3","01","多媒体教室","48","48","24"],["000003000013","000003",3,"公共教学三楼","3301","3","01","多媒体教室","54","54","27"],["000003000014","000003",3,"公共教学三楼","3302","3","01","多媒体教室","63","63","31"],["000003000048","000003",3,"公共教学三楼","3303","3","10","普通教室","100","100","50"],["000003000015","000003",3,"公共教学三楼","3304","3","01","多媒体教室","63","63","31"],["000003000016","000003",3,"公共教学三楼","3305","3","01","多媒体教室","63","63","31"],["000003000017","000003",3,"公共教学三楼","3306","3","01","多媒体教室","63","63","31"],["000003000018","000003",3,"公共教学三楼","3307","3","01","多媒体教室","63","63","31"],["000003000019","000003",3,"公共教学三楼","3308","3","01","多媒体教室","104","104","52"],["000003000020","000003",3,"公共教学三楼","3309","3","01","多媒体教室","63","63","31"],["000003000021","000003",3,"公共教学三楼","3310","3","01","多媒体教室","104","104","52"],["000003000022","000003",3,"公共教学三楼","3401","4","01","多媒体教室","54","54","27"],["000003000023","000003",3,"公共教学三楼","3402","4","01","多媒体教室","63","63","31"],["000003000024","000003",3,"公共教学三楼","3403","4","01","多媒体教室","63","63","31"],["000003000025","000003",3,"公共教学三楼","3404","4","01","多媒体教室","63","63","31"],["000003000026","000003",3,"公共教学三楼","3405","4","10","普通教室","63","63","31"],["000003000027","000003",3,"公共教学三楼","3406","4","01","多媒体教室","63","63","31"],["000003000028","000003",3,"公共教学三楼","3407","4","01","多媒体教室","63","63","31"],["000003000029","000003",3,"公共教学三楼","3408","4","01","多媒体教室","63","63","31"],["000003000030","000003",3,"公共教学三楼","3409","4","01","多媒体教室","63","63","31"],["000003000031","000003",3,"公共教学三楼","3410","4","01","多媒体教室","63","63","31"],["000003000046","000003",3,"公共教学三楼","3412","4","01","多媒体教室","63","63","31"],["000003000032","000003",3,"公共教学三楼","3501","5","01","多媒体教室","54","54","27"],["000003000033","000003",3,"公共教学三楼","3502","5","01","多媒体教室","63","63","31"],["000003000034","000003",3,"公共教学三楼","3503","5","01","多媒体教室","63","63","31"],["000003000035","000003",3,"公共教学三楼","3504","5","01","多媒体教室","63","63","31"],["000003000036","000003",3,"公共教学三楼","3505","5","01","多媒体教室","63","63","31"],["000003000037","000003",3,"公共教学三楼","3506","5","01","多媒体教室","63","63","31"],["000003000038","000003",3,"公共教学三楼","3507","5","01","多媒体教室","63","63","31"],["000003000039","000003",3,"公共教学三楼","3508","5","01","多媒体教室","63","63","31"],["000003000040","000003",3,"公共教学三楼","3509","5","01","多媒体教室","63","63","31"],["000003000041","000003",3,"公共教学三楼","3510","5","01","多媒体教室","63","63","31"],["000003000042","000003",3,"公共教学三楼","3511","5","01","多媒体教室","63","63","31"],["000003000043","000003",3,"公共教学三楼","语音11","2","02","语音教室","48","48","24"],["000003000044","000003",3,"公共教学三楼","语音12","2","02","语音教室","56","56","28"],["000003000045","000003",3,"公共教学三楼","语音13","3","02","语音教室","48","48","24"]],[["000004000084","000004",4,"求是楼","0120","1","01","多媒体教室","200","200","200"],["000004000085","000004",4,"求是楼","0220","2","01","多媒体教室","200","200","200"],["000004000086","000004",4,"求是楼","0221","2","01","多媒体教室","38","38","38"],["000004000091","000004",4,"求是楼","0222","2","01","多媒体教室","76","76","76"],["000004000087","000004",4,"求是楼","0223","2","01","多媒体教室","76","76","76"],["000004000088","000004",4,"求是楼","0224","2","01","多媒体教室","200","200","200"],["000004000090","000004",4,"求是楼","0324","3","01","多媒体教室","200","200","200"],["000004000092","000004",4,"求是楼","0425","4","14","机房","25","25","25"]],[["000005000030","000005",5,"明德主楼","0201","2","02","语音教室","34","34","34"],["000005000001","000005",5,"明德主楼","0204","2","01","多媒体教室","28","28","14"],["000005000002","000005",5,"明德主楼","0205","2","01","多媒体教室","38","38","38"],["000005000003","000005",5,"明德主楼","0206","2","01","多媒体教室","38","38","38"],["000005000004","000005",5,"明德主楼","0207","2","01","多媒体教室","31","31","31"],["000005000005","000005",5,"明德主楼","0208","2","01","多媒体教室","36","36","36"],["000005000006","000005",5,"明德主楼","0209","2","01","多媒体教室","36","36","36"],["000005000031","000005",5,"明德主楼","0301","3","02","语音教室","34","34","34"],["000005000032","000005",5,"明德主楼","0302","3","02","语音教室","56","56","56"],["000005000033","000005",5,"明德主楼","0303","3","02","语音教室","68","68","68"],["000005000007","000005",5,"明德主楼","0304","3","01","多媒体教室","61","61","61"],["000005000008","000005",5,"明德主楼","0305","3","01","多媒体教室","40","40","40"],["000005000009","000005",5,"明德主楼","0306","3","01","多媒体教室","40","40","40"],["000005000010","000005",5,"明德主楼","0307","3","01","多媒体教室","61","61","61"],["000005000011","000005",5,"明德主楼","0308","3","01","多媒体教室","61","61","61"],["000005000012","000005",5,"明德主楼","0404","4","01","多媒体教室","36","36","36"],["000005000013","000005",5,"明德主楼","0405","4","01","多媒体教室","40","40","40"],["000005000014","000005",5,"明德主楼","0406","4","01","多媒体教室","30","30","30"],["000005000015","000005",5,"明德主楼","0407","4","01","多媒体教室","58","58","58"],["000005000016","000005",5,"明德主楼","0408","4","01","多媒体教室","30","30","30"],["000005000017","000005",5,"明德主楼","0409","4","01","多媒体教室","58","58","58"],["000005000018","000005",5,"明德主楼","0410","4","01","多媒体教室","30","30","30"],["000005000019","000005",5,"明德主楼","0411","4","01","多媒体教室","36","36","36"],["000005000020","000005",5,"明德主楼","0412","4","01","多媒体教室","30","30","30"],["000005000021","000005",5,"明德主楼","0413","4","01","多媒体教室","36","36","36"],["000005000022","000005",5,"明德主楼","0414","4","01","多媒体教室","30","30","30"],["000005000023","000005",5,"明德主楼","0415","4","01","多媒体教室","40","40","40"],["000005000024","000005",5,"明德主楼","0416","4","01","多媒体教室","34","34","34"],["000005000025","000005",5,"明德主楼","0417","4","01","多媒体教室","36","36","36"],["000005000026","000005",5,"明德主楼","0418","4","01","多媒体教室","30","30","30"],["000005000028","000005",5,"明德主楼","0506","5","03","交互式","28","28","28"],["000005000027","000005",5,"明德主楼","0507","5","19","财政金融学院专用教室","60","60","60"],["000005000029","000005",5,"明德主楼","0513","5","14","机房","50","50","50"],["000005000034","000005",5,"明德主楼","0515","5","01","多媒体教室","70","70","35"],["000005000035","000005",5,"明德主楼","510","5","27","经济学院专用教室","35","35","35"]],[["000006000002","000006",6,"明德商学楼","0102","1","01","多媒体教室","131","131","131"],["000006000003","000006",6,"明德商学楼","0104","1","01","多媒体教室","56","56","56"],["000006000004","000006",6,"明德商学楼","0105","1","01","多媒体教室","58","58","58"],["000006000005","000006",6,"明德商学楼","0201","2","01","多媒体教室","30","30","30"],["000006000006","000006",6,"明德商学楼","0202","2","01","多媒体教室","131","131","131"],["000006000007","000006",6,"明德商学楼","0204","2","01","多媒体教室","64","64","32"],["000006000008","000006",6,"明德商学楼","0205","2","01","多媒体教室","24","24","24"],["000006000009","000006",6,"明德商学楼","0206","2","01","多媒体教室","28","28","28"],["000006000010","000006",6,"明德商学楼","0207","2","01","多媒体教室","54","54","54"],["000006000011","000006",6,"明德商学楼","0208","2","01","多媒体教室","60","60","60"],["000006000012","000006",6,"明德商学楼","0301","3","01","多媒体教室","30","30","30"],["000006000013","000006",6,"明德商学楼","0302","3","01","多媒体教室","131","131","131"],["000006000015","000006",6,"明德商学楼","0305","3","01","多媒体教室","24","24","24"],["000006000016","000006",6,"明德商学楼","0306","3","01","多媒体教室","24","24","24"],["000006000017","000006",6,"明德商学楼","0307","3","01","多媒体教室","54","54","54"],["000006000018","000006",6,"明德商学楼","0308","3","01","多媒体教室","30","30","30"],["000006000019","000006",6,"明德商学楼","0309","3","01","多媒体教室","60","60","60"],["000006000020","000006",6,"明德商学楼","0310","3","01","多媒体教室","30","30","30"],["000006000021","000006",6,"明德商学楼","0401","4","01","多媒体教室","30","30","30"],["000006000022","000006",6,"明德商学楼","0402","4","01","多媒体教室","131","131","131"],["000006000024","000006",6,"明德商学楼","0405","4","01","多媒体教室","24","24","24"],["000006000025","000006",6,"明德商学楼","0406","4","01","多媒体教室","24","24","24"],["000006000026","000006",6,"明德商学楼","0407","4","01","多媒体教室","54","54","54"],["000006000027","000006",6,"明德商学楼","0408","4","01","多媒体教室","30","30","30"],["000006000028","000006",6,"明德商学楼","0409","4","01","多媒体教室","60","60","60"],["000006000029","000006",6,"明德商学楼","0410","4","01","多媒体教室","30","30","30"],["000006000030","000006",6,"明德商学楼","0502","5","01","多媒体教室","131","131","131"],["000006000031","000006",6,"明德商学楼","0507","5","18","商学院专用教室","50","50","50"],["000006000032","000006",6,"明德商学楼","0509","5","18","商学院专用教室","50","50","50"],["000006000034","000006",6,"明德商学楼","0600","6","18","商学院专用教室","15","15","15"],["000006000033","000006",6,"明德商学楼","0602","6","18","商学院专用教室","55","55","30"]],[["000007000001","000007",7,"明德法学楼","0101","1","01","多媒体教室","210","210","210"],["000007000002","000007",7,"明德法学楼","0102","1","01","多媒体教室","137","137","137"],["000007000003","000007",7,"明德法学楼","0201","2","01","多媒体教室","204","204","102"],["000007000004","000007",7,"明德法学楼","0202","2","01","多媒体教室","137","137","68"],["000007000005","000007",7,"明德法学楼","0301","3","01","多媒体教室","219","219","109"],["000007000006","000007",7,"明德法学楼","0302","3","01","多媒体教室","137","137","68"],["000007000012","000007",7,"明德法学楼","0303","3","21","法学院专用教室","30","30","30"],["000007000007","000007",7,"明德法学楼","0401","4","01","多媒体教室","219","219","109"],["000007000008","000007",7,"明德法学楼","0402","4","01","多媒体教室","137","137","68"],["000007000009","000007",7,"明德法学楼","0501","5","01","多媒体教室","219","219","109"],["000007000010","000007",7,"明德法学楼","0502","5","01","多媒体教室","137","137","68"],["000007000011","000007",7,"明德法学楼","0602","6","21","法学院专用教室","60","60","30"],["000007000014","000007",7,"明德法学楼","0708","7","21","法学院专用教室","100","100","50"],["000007000015","000007",7,"明德法学楼","304","3","21","法学院专用教室","30","30","15"],["000007000013","000007",7,"明德法学楼","实验室","6","21","法学院专用教室","90","90","90"]],[["000008000008","000008",8,"世纪馆","B202","2","13","体育场地","500","500","500"],["000008000003","000008",8,"世纪馆","B206","2","13","体育场地","500","500","500"],["000008000002","000008",8,"世纪馆","B208","2","13","体育场地","500","500","500"],["000008000010","000008",8,"世纪馆","B216","-1","13","体育场地","200","200","200"],["000008000009","000008",8,"世纪馆","主馆","2","13","体育场地","100","100","100"],["000008000004","000008",8,"世纪馆","北201","2","13","体育场地","500","500","500"],["000008000005","000008",8,"世纪馆","北203","2","13","体育场地","500","500","500"],["000008000007","000008",8,"世纪馆","南201","2","13","体育场地","500","500","500"],["000008000006","000008",8,"世纪馆","南203","2","13","体育场地","500","500","500"],["000008000001","000008",8,"世纪馆","南303","3","11","音乐选修专用教室","300","300","300"]],[["000009000001","000009",9,"学生活动中心","舞蹈厅","1","12","舞蹈选修专用教室","50","50","50"]],[["000010000003","000010",10,"工字楼","Y001","1","22","徐悲鸿艺术学院专用教室","20","20","20"],["000010000004","000010",10,"工字楼","Y002","1","22","徐悲鸿艺术学院专用教室","20","20","20"],["000010000005","000010",10,"工字楼","Y003","1","22","徐悲鸿艺术学院专用教室","20","20","20"],["000010000006","000010",10,"工字楼","Y004","1","22","徐悲鸿艺术学院专用教室","20","20","20"],["000010000001","000010",10,"工字楼","北208","2","10","普通教室","20","20","20"],["000010000002","000010",10,"工字楼","工字楼","1","22","徐悲鸿艺术学院专用教室","100","100","100"]],[["000011000001","000011",11,"游泳馆","游泳池","1","13","体育场地","150","150","150"]],[["000012000002","000012",12,"拳道馆","乒乓厅","1","13","体育场地","24","24","24"],["000012000001","000012",12,"拳道馆","篮球厅","1","13","体育场地","30","30","30"]],[["000013000012","000013",13,"理工楼","0507","5","15","实验室","20","20","20"],["000013000013","000013",13,"理工楼","0801","8","25","理学院专用教室","40","40","40"],["000013000014","000013",13,"理工楼","501","5","15","实验室","20","20","20"],["000013000015","000013",13,"理工楼","502","5","15","实验室","20","20","20"],["000013000016","000013",13,"理工楼","503","5","15","实验室","20","20","20"],["000013000011","000013",13,"理工楼","719","7","25","理学院专用教室","40","40","40"],["000013000017","000013",13,"理工楼","801","8","15","实验室","20","20","20"],["000013000018","000013",13,"理工楼","802","8","15","实验室","20","20","20"],["000013000019","000013",13,"理工楼","803","8","15","实验室","20","20","20"]],[["000014000002","000014",14,"信息楼","0115","1","10","普通教室","58","58","29"],["000014000003","000014",14,"信息楼","0116","1","10","普通教室","54","54","27"],["000014000004","000014",14,"信息楼","0118","1","10","普通教室","58","58","29"],["000014000005","000014",14,"信息楼","0123","1","10","普通教室","54","54","27"],["000014000006","000014",14,"信息楼","0124","1","10","普通教室","54","54","27"],["000014000007","000014",14,"信息楼","0125","1","10","普通教室","54","54","27"],["000014000008","000014",14,"信息楼","0127","1","10","普通教室","54","54","27"],["000014000014","000014",14,"信息楼","0205","2","17","信息资源管理学院专用教室","20","20","20"],["000014000016","000014",14,"信息楼","0207","2","14","机房","20","20","20"],["000014000011","000014",14,"信息楼","0403","4","17","信息资源管理学院专用教室","40","40","40"],["000014000013","000014",14,"信息楼","0409","4","14","机房","40","40","40"],["000014000017","000014",14,"信息楼","301","3","17","信息资源管理学院专用教室","100","100","50"],["000014000015","000014",14,"信息楼","402","4","14","机房","30","30","30"],["000014000012","000014",14,"信息楼","实验室","4","20","信息学院专用教室","100","100","100"],["000014000018","000014",14,"信息楼","机房","1","14","机房","30","30","30"]],[["000015000001","000015",15,"明德国际楼","0103","1","02","语音教室","30","30","30"],["000015000003","000015",15,"明德国际楼","0106","1","02","语音教室","30","30","30"],["000015000004","000015",15,"明德国际楼","0107","1","02","语音教室","20","20","20"],["000015000005","000015",15,"明德国际楼","0204","2","02","语音教室","28","28","28"],["000015000006","000015",15,"明德国际楼","0205","2","02","语音教室","30","30","30"],["000015000007","000015",15,"明德国际楼","0206","2","02","语音教室","30","30","30"],["000015000008","000015",15,"明德国际楼","0207","2","02","语音教室","30","30","30"],["000015000009","000015",15,"明德国际楼","0304","3","01","多媒体教室","28","28","28"],["000015000010","000015",15,"明德国际楼","0305","3","01","多媒体教室","34","34","34"],["000015000011","000015",15,"明德国际楼","0306","3","01","多媒体教室","28","28","28"],["000015000012","000015",15,"明德国际楼","0307","3","01","多媒体教室","34","34","34"],["000015000013","000015",15,"明德国际楼","0308","3","01","多媒体教室","24","24","24"]],[["000016000001","000016",16,"明德新闻楼","0101","1","01","多媒体教室","30","30","30"],["000016000002","000016",16,"明德新闻楼","0102","1","01","多媒体教室","26","26","13"],["000016000003","000016",16,"明德新闻楼","0104","1","01","多媒体教室","30","30","15"],["000016000004","000016",16,"明德新闻楼","0201","2","01","多媒体教室","58","58","29"],["000016000005","000016",16,"明德新闻楼","0202","2","01","多媒体教室","29","29","14"],["000016000006","000016",16,"明德新闻楼","0203","2","01","多媒体教室","32","32","16"],["000016000007","000016",16,"明德新闻楼","0204","2","01","多媒体教室","27","27","13"],["000016000008","000016",16,"明德新闻楼","0205","2","01","多媒体教室","28","28","14"],["000016000009","000016",16,"明德新闻楼","0206","2","01","多媒体教室","23","23","11"],["000016000020","000016",16,"明德新闻楼","0208","2","01","多媒体教室","60","60","60"],["000016000021","000016",16,"明德新闻楼","0210","2","16","新闻学院专用教室","30","30","30"],["000016000018","000016",16,"明德新闻楼","0301","3","16","新闻学院专用教室","50","50","50"],["000016000010","000016",16,"明德新闻楼","0402","4","01","多媒体教室","37","37","18"],["000016000011","000016",16,"明德新闻楼","0403","4","01","多媒体教室","57","57","28"],["000016000012","000016",16,"明德新闻楼","0404","4","01","多媒体教室","28","28","14"],["000016000013","000016",16,"明德新闻楼","0405","4","01","多媒体教室","35","35","17"],["000016000014","000016",16,"明德新闻楼","0406","4","01","多媒体教室","28","28","14"],["000016000015","000016",16,"明德新闻楼","0407","4","01","多媒体教室","50","50","25"],["000016000016","000016",16,"明德新闻楼","0408","4","01","多媒体教室","28","28","14"],["000016000022","000016",16,"明德新闻楼","0611","6","16","新闻学院专用教室","60","60","30"],["000016000019","000016",16,"明德新闻楼","0711","7","16","新闻学院专用教室","70","70","70"],["000016000024","000016",16,"明德新闻楼","0721","7","16","新闻学院专用教室","20","20","10"],["000016000025","000016",16,"明德新闻楼","0722","7","16","新闻学院专用教室","20","20","10"],["000016000023","000016",16,"明德新闻楼","508","5","16","新闻学院专用教室","20","20","10"]],[["000017000001","000017",17,"明德地下广场","1001","-1","14","机房","15","15","15"],["000017000002","000017",17,"明德地下广场","1002","-1","14","机房","15","15","15"],["000017000003","000017",17,"明德地下广场","1003","-1","14","机房","15","15","15"],["000017000004","000017",17,"明德地下广场","1004","-1","14","机房","15","15","15"],["000017000005","000017",17,"明德地下广场","1005","-1","14","机房","15","15","15"],["000017000006","000017",17,"明德地下广场","1006","-1","14","机房","27","27","27"],["000017000007","000017",17,"明德地下广场","1007","-1","14","机房","80","80","80"],["000017000008","000017",17,"明德地下广场","1008","-1","14","机房","122","122","122"],["000017000009","000017",17,"明德地下广场","1009","-1","14","机房","122","122","122"],["000017000010","000017",17,"明德地下广场","1010","-1","14","机房","58","58","58"],["000017000011","000017",17,"明德地下广场","1011","-1","14","机房","58","58","58"],["000017000012","000017",17,"明德地下广场","1012","-1","14","机房","44","44","44"],["000017000013","000017",17,"明德地下广场","1013","-1","14","机房","35","35","35"],["000017000014","000017",17,"明德地下广场","1014","-1","14","机房","39","39","39"],["000017000015","000017",17,"明德地下广场","1015","-1","14","机房","37","37","37"]],[["000018000001","000018",18,"卡帝乐网球场","网球场","1","13","体育场地","30","30","30"]],[["000019000001","000019",19,"田径场","田径场","1","13","体育场地","500","500","500"]],[["000020000001","000020",20,"室外篮球场","篮球场","1","13","体育场地","500","500","500"]],[["000021000001","000021",21,"小足球场","足球场","1","13","体育场地","500","500","500"]],[["000022000001","000022",22,"小学操场","小操场","1","13","体育场地","500","500","500"]],[["000023000001","000023",23,"附小排球场","排球场","1","13","体育场地","500","500","500"]],[["000024000001","000024",24,"土网球场","网球场","1","13","体育场地","100","100","100"]],[["000025000002","000025",25,"理工楼配楼","202B","2","14","机房","50","50","50"],["000025000003","000025",25,"理工楼配楼","203B","2","14","机房","50","50","50"],["000025000004","000025",25,"理工楼配楼","205B","2","14","机房","50","50","50"],["000025000001","000025",25,"理工楼配楼","配楼","2","14","机房","500","500","500"]],[["000026000001","000026",26,"研究生3楼","活动2","2","22","徐悲鸿艺术学院专用教室","100","100","100"],["000026000002","000026",26,"研究生3楼","活动3","3","22","徐悲鸿艺术学院专用教室","100","100","100"],["000026000003","000026",26,"研究生3楼","活动6","6","22","徐悲鸿艺术学院专用教室","100","100","100"],["000026000004","000026",26,"研究生3楼","活动7","7","22","徐悲鸿艺术学院专用教室","100","100","100"],["000026000005","000026",26,"研究生3楼","活动8","8","22","徐悲鸿艺术学院专用教室","100","100","100"],["000026000006","000026",26,"研究生3楼","活动9","9","22","徐悲鸿艺术学院专用教室","100","100","100"]],[["000027000001","000027",27,"游泳馆配楼","配五层","5","22","徐悲鸿艺术学院专用教室","100","100","100"],["000027000002","000027",27,"游泳馆配楼","配六层","6","22","徐悲鸿艺术学院专用教室","100","100","100"]],[["000028000002","000028",28,"徐艺东区教室","小展厅","1","06","活动桌椅","20","20","20"],["000028000001","000028",28,"徐艺东区教室","徐艺东","1","22","徐悲鸿艺术学院专用教室","100","100","100"]],[["000029000001","000029",29,"天光教室","天光1","1","22","徐悲鸿艺术学院专用教室","100","100","100"],["000029000002","000029",29,"天光教室","天光2","1","22","徐悲鸿艺术学院专用教室","100","100","100"],["000029000003","000029",29,"天光教室","天光3","1","22","徐悲鸿艺术学院专用教室","100","100","100"],["000029000004","000029",29,"天光教室","天光4","1","22","徐悲鸿艺术学院专用教室","100","100","100"]],[["000030000001","000030",30,"附小网球场","网球场","1","13","体育场地","30","30","30"]],[["000031000001","000031",31,"教学五楼","5105","1","23","对外语言文化学院专用教室","16","16","16"],["000031000002","000031",31,"教学五楼","5106","1","23","对外语言文化学院专用教室","16","16","16"],["000031000004","000031",31,"教学五楼","5112","1","23","对外语言文化学院专用教室","24","24","24"],["000031000003","000031",31,"教学五楼","5113","1","23","对外语言文化学院专用教室","24","24","24"],["000031000005","000031",31,"教学五楼","5205","2","10","普通教室","20","20","20"],["000031000006","000031",31,"教学五楼","5207","2","10","普通教室","20","20","20"]],[["000032000002","000032",32,"科研楼A座","201","2","24","社会与人口学院专用教室","30","30","30"],["000032000003","000032",32,"科研楼A座","511","5","15","实验室","40","40","40"],["000032000001","000032",32,"科研楼A座","610","6","24","社会与人口学院专用教室","27","27","27"],["000032000004","000032",32,"科研楼A座","912","9","01","多媒体教室","30","30","30"]],[["000033000001","000033",33,"人文楼","六层","6","26","哲学院专用教室","40","40","40"]],[["000034000001","000034",34,"灯光篮球场","灯光场","1","13","体育场地","100","100","100"]],[["000035000001","000035",35,"贤进楼","901","9","15","实验室","30","30","30"]],[["000036000001","000036",36,"国学楼","110","1","10","普通教室","47","47","47"],["000036000011","000036",36,"国学楼","111","1","28","国学院专用教室","58","58","58"],["000036000002","000036",36,"国学楼","112","1","10","普通教室","72","72","72"],["000036000003","000036",36,"国学楼","113","1","10","普通教室","172","172","172"],["000036000004","000036",36,"国学楼","114","1","10","普通教室","180","180","180"],["000036000005","000036",36,"国学楼","226","2","10","普通教室","202","202","202"],["000036000006","000036",36,"国学楼","228","2","10","普通教室","155","155","155"],["000036000007","000036",36,"国学楼","B110","-1","01","多媒体教室","47","47","47"],["000036000008","000036",36,"国学楼","B111","-1","01","多媒体教室","47","47","47"],["000036000009","000036",36,"国学楼","B112","-1","01","多媒体教室","63","63","63"],["000036000010","000036",36,"国学楼","B113","-1","01","多媒体教室","75","75","75"]],[["000037000030","000037",37,"修远楼","102","1","01","多媒体教室","60","60","30"],["000037000001","000037",37,"修远楼","106","1","01","多媒体教室","40","40","20"],["000037000002","000037",37,"修远楼","107","1","01","多媒体教室","40","40","20"],["000037000003","000037",37,"修远楼","108","1","01","多媒体教室","40","40","20"],["000037000004","000037",37,"修远楼","109","1","01","多媒体教室","40","40","20"],["000037000005","000037",37,"修远楼","110","1","01","多媒体教室","40","40","20"],["000037000006","000037",37,"修远楼","111","1","01","多媒体教室","40","40","20"],["000037000007","000037",37,"修远楼","112","1","01","多媒体教室","40","40","20"],["000037000008","000037",37,"修远楼","114","1","01","多媒体教室","94","94","56"],["000037000009","000037",37,"修远楼","115","1","01","多媒体教室","94","94","56"],["000037000010","000037",37,"修远楼","116","1","01","多媒体教室","94","94","56"],["000037000011","000037",37,"修远楼","117","1","01","多媒体教室","94","94","56"],["000037000012","000037",37,"修远楼","118","1","01","多媒体教室","120","120","60"],["000037000013","000037",37,"修远楼","119","1","01","多媒体教室","220","220","110"],["000037000014","000037",37,"修远楼","120","1","01","多媒体教室","170","170","0"],["000037000029","000037",37,"修远楼","202","2","01","多媒体教室","94","94","58"],["000037000015","000037",37,"修远楼","205","2","01","多媒体教室","40","40","20"],["000037000016","000037",37,"修远楼","206","2","01","多媒体教室","40","40","20"],["000037000017","000037",37,"修远楼","207","2","01","多媒体教室","40","40","20"],["000037000018","000037",37,"修远楼","208","2","01","多媒体教室","40","40","20"],["000037000019","000037",37,"修远楼","209","2","01","多媒体教室","40","40","20"],["000037000020","000037",37,"修远楼","210","2","01","多媒体教室","40","40","20"],["000037000021","000037",37,"修远楼","211","2","01","多媒体教室","40","40","20"],["000037000031","000037",37,"修远楼","215","2","01","多媒体教室","94","94","58"],["000037000032","000037",37,"修远楼","216","2","01","多媒体教室","94","94","58"],["000037000027","000037",37,"修远楼","225","2","01","多媒体教室","120","120","60"],["000037000022","000037",37,"修远楼","303","3","01","多媒体教室","101","101","50"],["000037000024","000037",37,"修远楼","310","3","01","多媒体教室","40","40","20"],["000037000025","000037",37,"修远楼","312","3","01","多媒体教室","40","40","20"],["000037000026","000037",37,"修远楼","313","3","01","多媒体教室","40","40","20"],["000037000023","000037",37,"修远楼","315","3","01","多媒体教室","94","94","56"],["000037000033","000037",37,"修远楼","316","3","01","多媒体教室","94","94","58"],["000037000034","000037",37,"修远楼","317","3","01","多媒体教室","94","94","58"],["000037000035","000037",37,"修远楼","410","4","01","多媒体教室","40","40","20"],["000037000039","000037",37,"修远楼","411","4","01","多媒体教室","40","40","20"],["000037000040","000037",37,"修远楼","412","4","01","多媒体教室","40","40","20"],["000037000036","000037",37,"修远楼","413","4","01","多媒体教室","40","40","20"],["000037000041","000037",37,"修远楼","417","4","01","多媒体教室","94","94","58"],["000037000037","000037",37,"修远楼","418","4","01","多媒体教室","94","94","58"],["000037000038","000037",37,"修远楼","419","4","01","多媒体教室","94","94","58"],["000037000028","000037",37,"修远楼","报告厅","2","01","多媒体教室","340","340","170"]],[["000038000001","000038",38,"独墅湖体育馆","体育馆","1","13","体育场地","500","500","500"]],[["000039000001","000039",39,"艺术楼","532","5","22","徐悲鸿艺术学院专用教室","20","20","20"]],[["000040000001","000040",40,"环境学院","111","1","03","交互式","20","20","20"],["000040000002","000040",40,"环境学院","127","1","06","活动桌椅","20","20","20"]],[["000041000002","000041",41,"公共教学四楼","4106","1","01","多媒体教室","60","60","30"],["000041000003","000041",41,"公共教学四楼","4107","1","01","多媒体教室","60","60","30"],["000041000004","000041",41,"公共教学四楼","4108","1","01","多媒体教室","60","60","30"],["000041000005","000041",41,"公共教学四楼","4109","1","01","多媒体教室","60","60","30"],["000041000001","000041",41,"公共教学四楼","4201","2","01","多媒体教室","100","100","50"],["000041000006","000041",41,"公共教学四楼","4203","2","01","多媒体教室","60","60","30"],["000041000007","000041",41,"公共教学四楼","4204","2","01","多媒体教室","60","60","30"],["000041000008","000041",41,"公共教学四楼","4205","2","01","多媒体教室","60","60","30"],["000041000009","000041",41,"公共教学四楼","4206","2","01","多媒体教室","60","60","30"],["000041000011","000041",41,"公共教学四楼","4302","3","01","多媒体教室","60","60","30"],["000041000012","000041",41,"公共教学四楼","4303","3","01","多媒体教室","60","60","30"],["000041000013","000041",41,"公共教学四楼","4304","3","01","多媒体教室","60","60","30"],["000041000014","000041",41,"公共教学四楼","4305","3","01","多媒体教室","60","60","30"]],[["000042000001","000042",42,"博物馆","202","2","01","多媒体教室","20","20","20"]],[["000043000001","000043",43,"北园物理楼","106","1","01","多媒体教室","40","40","20"],["000043000002","000043",43,"北园物理楼","301","3","01","多媒体教室","30","30","15"]],[["000044000001","000044",44,"开太楼","A101","1","14","机房","50","50","25"],["000044000002","000044",44,"开太楼","A102","1","14","机房","60","60","30"]]];
module.exports = {
    rooms: rooms,
    buildings: buildings
};
},{}],5:[function(require,module,exports){
/**
* @Author: slr
* @Date:   2016-11-06T19:57:51+08:00
* @Last modified by:   slr
* @Last modified time: 2016-12-07T15:51:49+08:00
*/



module.exports = ['$scope', '$http', '$compile', 'DTColumnBuilder', function ($scope, $http, $compile, DTColumnBuilder) {
    $scope.DT = {};
    $scope.DT.options = {
        ajaxSource: "../../classroom/lend/history",
        serverSide: true,
        paging: true,
        pageLength: 25,
        pagingType: "full_numbers",
        createdRow: function (row, data, dataIndex) {
            $compile(angular.element(row).contents())($scope);
        },
        fnServerData: function(sSource, aoData, fnCallback, oSettings){
            var params = {};
            aoData.forEach(function (v, i) {
                params[v.name] = v.value;
            });
            $http.get(sSource, {params: params})
            .then(function(response) {
                if (response.status === 200) {
                    fnCallback(response.data);
                }
            }, function (e) {
                console.log(e);
            });
       }
    };
    $scope.DT.instance = {};
    function reloadData() {
        var resetPaging = false;
        $scope.DT.instance.rerender();
    }
    var btnTpl = $('#t-history-btn').html();
    $scope.DT.columns = [
        DTColumnBuilder.newColumn('ccrtime').withTitle('借出时间').notSortable(),
        DTColumnBuilder.newColumn('gc').withTitle('教室编号').notSortable(),
        DTColumnBuilder.newColumn('use_time').withTitle('借用时间').notSortable(),
        DTColumnBuilder.newColumn('remarks').withTitle('备注').notSortable(),
        DTColumnBuilder.newColumn(null).withTitle('操作').notSortable()
            .renderWith(function(data, type, full, meta) {
            return btnTpl.replace('$id', data.ccrno);
        })
    ];
    $scope.recall = function(id) {
        $http.post('../../classroom/lend/cancel', {ccrno: id}).success(function (data) {
            console.log(data);
            if (data.status === 1) {
                alert('撤销成功');
            } else {
                alert('撤销失败');
            }
            reloadData();
        }).error(function () {
            alert('撤销失败');
            reloadData();
        });
    };
}];

},{}],6:[function(require,module,exports){
/**
* @Author: slr
* @Date:   2016-11-06T19:58:03+08:00
* @Last modified by:   slr
* @Last modified time: 2016-11-10T16:58:22+08:00
*/



module.exports = ['$scope', 'FileUploader', '$rootScope', '$scope', function ($scope, FileUploader, $rootScope, $scope) {
    $scope.q = {
        school_week_num: 20,
        school_year: '2016-2017',
        school_term: '春季学期'
    };
    var uploader = $scope.uploader = new FileUploader({
        url: '../../classroom/import/process',
        removeAfterUpload: true,
        alias: 'upload[]',
        headers: {Ajax: true},
        isHTML5: true,
        onBeforeUploadItem: function (item) {
            item.formData = [$scope.q];
        },
        onAfterAddingFile: function () {
            uploader.queue = uploader.queue.slice(-1);
        },
        onSuccessItem: function (file, data) {
            if (data.info) alert(data.info);
            else alert('上传成功');
        },
        onErrorItem: function (item, response, status, headers) {
            item.isUploaded = false;
            setTimeout(function () {
                uploader.queue = [item];
            }, 500);
            if (status == 401) {
                $rootScope.isLogging = true;
            }
        }
    });
    $scope.upload = function () {
        uploader.uploadAll();
    };

}];

},{}],7:[function(require,module,exports){
/*
* @Author: slr
* @Date:   2016-06-03 15:11:19
* @Last modified by:   slr
* @Last modified time: 2017-02-22T19:28:02+08:00
*/

'use strict';
var lib = require('./lib.js');
var data = require('./data.js');
// var mock = require('./mock.js');
var detail = require('./detailData.js');
var angular = lib.angular;
var $ = lib.$;
require('angular-route');


var app = angular.module('app', ['ui.bootstrap', 'datatables', 'ngRoute', 'angularFileUpload']);
app.config(['$httpProvider', function($httpProvider){
  // Use x-www-form-urlencoded Content-Type
  $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
  $httpProvider.defaults.withCredentials = true;
  // Override $http service's default transformRequest
  $httpProvider.defaults.transformRequest = [function(data)
  {
    /**
     * The workhorse; converts an object to x-www-form-urlencoded serialization.
     * @param {Object} obj
     * @return {String}
     */
    var param = function(obj)
    {
      var query = '';
      var name, value, fullSubName, subName, subValue, innerObj, i;

      for(name in obj)
      {
        value = obj[name];

        if(value instanceof Array)
        {
          for(i=0; i<value.length; ++i)
          {
            subValue = value[i];
            fullSubName = name + '[' + i + ']';
            innerObj = {};
            innerObj[fullSubName] = subValue;
            query += param(innerObj) + '&';
          }
        }
        else if(value instanceof Object)
        {
          for(subName in value)
          {
            subValue = value[subName];
            fullSubName = name + '[' + subName + ']';
            innerObj = {};
            innerObj[fullSubName] = subValue;
            query += param(innerObj) + '&';
          }
        }
        else if(value !== undefined && value !== null)
        {
          query += encodeURIComponent(name) + '=' + encodeURIComponent(value) + '&';
        }
      }

      return query.length ? query.substr(0, query.length - 1) : query;
    };

    return angular.isObject(data) && String(data) !== '[object File]' ? param(data) : data;
  }];
}])
.factory('loginInterceptor', ['$rootScope', function ($rootScope) {
    return {
        request: function(config) {
            config.headers.Ajax = true;
            return config;
        },
        requestError: function(config) {
            return config;
        },

        response: function(res) {
            var role = res.data.role;
            $rootScope.isAdmin = role === 'classroom_admin';
            return res;
        },

        responseError: function(res) {
            if (res.status == 401) {
                $rootScope.isLogging = true;
                $rootScope.pendingHttp = res.config;
            }
            return res;
        }
    };
}])
.config(['$httpProvider', function($httpProvider) {
    $httpProvider.interceptors.push('loginInterceptor');
}])
.config(function($routeProvider) {
    $routeProvider
    .when('/query', {
        template : $('#t-query').html(),
        controller: require('./query.ctrl.js')
    })
    .when('/query2', {
        template : $('#t-query-2').html(),
        controller: require('./query2.ctrl.js')
    })
    .when('/history', {
        template : $('#t-history').html(),
        controller: require('./history.ctrl.js')
    })
    .when('/import', {
        template : $('#t-import').html(),
        controller: require('./import.ctrl.js')
    })
    .otherwise({ redirectTo: '/query' });
});


app.controller('mainCtrl', ['$scope', '$routeParams', 'Login', '$rootScope', '$http',function ($scope, $routeParams, Login, $rootScope, $http) {
    $scope.queryType = 0;
    $scope.isProgressing = false;
    $scope.showProgress = function () {
        $scope.isProgressing = true;
    };
    $scope.hideProgress = function () {
        $scope.isProgressing = false;
    };
    $scope.showView = function (viewType) {
        $scope.viewType = viewType;
    };
    $scope.user = {};
    $scope.login = function () {
        Login.login($scope.user);
        return false;
    };
    $scope.cancelLogin = function () {
        $rootScope.isLogging = false;
    }
    $scope.showLogin = function () {
        $rootScope.isLogging = true;
    }
    $scope.logout = Login.logout;
    $http.get('../../classroom/index/role').success(function (data) {
        $rootScope.isAdmin = data.role === 'classroom_admin';
    })
}])
.controller('lendCtrl', ['$scope', '$http', '$uibModal', function ($scope, $http, $uibModal) {
    $scope.lend = function () {
        var rooms = $scope.rooms.filter(function (d) {
            return d.selected;
        }).map(function (d) {
            return d.crnum
        }).join(',');
        if (!rooms) {
            alert('请至少选择一间教室');
            return false;
        }
        $uibModal.open({
            template: $('#t-lend-preview-1').html(),
            scope: $scope,
            controller: ['$uibModalInstance', '$scope', '$http', function ($instance, $scope, $http) {
                $scope.fRooms = $scope.rooms.filter(function (d) {
                    return d.selected;
                });
                $scope.fTimes = $scope.timeList.filter(function (d) {
                    return d.checked;
                });
                var rooms = $scope.fRooms.map(function (d) {
                    return d.crnum;
                }).join(',');
                $scope.cancel = function () {
                    $instance.dismiss('cancel');
                };
                $scope.confirm = function () {
                    $http.post('../../classroom/lend/lend', angular.extend($scope.q, {rooms: rooms})).success(function (res) {
                        if (res.status === 0) {
                            $scope.fail = false;
                            $scope.lent = true;
                            $scope.query();
                            $scope.remarks = '';
                        } else {
                            $scope.fail = true;
                        }
                    }).finally(function () {
                        $scope.hideProgress();
                    });
                };
            }]
        });
    };
}])
.directive('ngDatepicker', [function () {
    return {
        link: function (scope, ele, attrs) {
            $(ele).daterangepicker({
                minDate: new Date(),
                singleDatePicker: true,
                locale: {
                    format: 'YYYY-MM-DD',
                    separator: ' - ',
                    applyLabel: '确定',
                    cancelLabel: '取消'
                }
            }).on('apply.daterangepicker', function (event, obj) {
                scope.$emit('apply.daterangepicker', obj);
            });
        }
    };
}])
.directive('ngSemSelector', ['$timeout', function ($timeout) {
    return {
        replace: true,
        scope: {
            query: '=',
            change: '='
        },
        template: '<select class="form-control" ng-options="o as o.year + o.sem for o in options", ng-model="t", ng-change="onChange()"></select>',
        link: function (scope) {
            var thisYear = 2017;
            var yearArr = [];
            for (var i = 0; i < 1; i++) {
                yearArr.push([thisYear + i, thisYear + i + 1].join('-'));
            }
            var semArr = ['秋季学期', '春季学期', '国际小学期'];
            var options = scope.options = [];
            // yearArr.forEach(function (y) {
            //     semArr.forEach(function (s) {
            //         options.push({
            //             year: y,
            //             sem: s
            //         });
            //     });
            // });
            options.push({
                year: '2017-2018',
                sem: '秋季学期',
                start: '2017-09-08',
                end: '2018-01-21'
            });
            options.push({
                year: '2017-2018',
                sem: '春季学期',
                start: '2018-02-26',
                end: '2018-07-08'
            });
            options.push({
                year: '2017-2018',
                sem: '国际小学期',
                start: '2018-07-08',
                end: '2018-08-05'
            })

            scope.t = options[0];
            scope.onChange = function () {
                var t = scope.t;
                scope.query.school_year = t.year;
                scope.query.school_term = t.sem;
                if (scope.change) scope.change.call(null, t);
            };
            $timeout(scope.onChange, 300);
        }
    }
}])
.service('Login', ['$rootScope', '$http', '$route', '$location', function ($rootScope, $http, $route, $location) {
    this.login = function (data) {
        $http.post('../../classroom/index/login', data).success(function (data) {
            if (data.status === 0) {
                $rootScope.isLogging = false;
                if (['/history', '/import'].indexOf($location.path()) > -1) {
                    $route.reload();
                }
            } else {
                alert(data.msg);
            }
        }).error(function () {
            alert('登录出错，请重试');
        });
    }
    this.logout = function () {
        $http.post('../../classroom/index/logout', {}).success(function () {
            alert('注销成功');
            if (['/history', '/import'].indexOf($location.path()) > -1) {
                location.hash = '#/query';
            }
        }).error(function () {
            alert('注销出错');
        })
    }
}])
.filter('roomName', [function () {
    return function (arr) {
        return [arr[4], '(', arr[8], ')'].join('');
    };
}])
.filter('className', [function () {
    return function (str) {
        if (!str) return str;
        else {
            str = str.replace(/\n/g, ' ').replace(/\s+/, '\n');
            if (str.indexOf('\n') < 0) {
                str = str.replace(/([A-Z]+)/, '$1\n');
            }
            if (str.indexOf('\n') < 0) {
                str = str.replace('（', '\n（');
            }
            if (str.indexOf('\n') < 0) {
                str = str.replace('(', '\n(');
            }
            return str;
        }
    };
}])
.filter('dateName', [function () {
    return function (d) {
        return [d.getFullYear(), d.getMonth() + 1, d.getDate()].map(function (t) {
            if (t < 10) t = '0' + t;
            return t;
        }).join('-');
    }
}])
.directive('ngTableFixed', ['$timeout', function ($timeout) {
    return {
        link: function (scope, ele) {
            $timeout(function () {
                $(ele).fxdHdrCol({
                    fixedCols: 2,
                    width: '100%',
                    height: 1000,
                    colModal: Array.apply(null, Array(100)).map(function (v, i) {
                        return i ? {width: 100, align: 'center'} : {width: 30, align: 'center'};
                    }),
                    sort: false
                });
            });
        }
    };
}])
.directive('ngSchoolCalendar', [function () {
    return {
        scope: {
            onChange: '=',
            clearDates: '='
        },
        link: function (scope, ele, attrs) {
            scope.$on('change', function (event, data) {
                $(ele).find('table').remove();
                scope.calendar = $(ele).schoolCalendar({
                    startDate: new Date(data.start),
                    endDate: new Date(data.end),
                    onChange: scope.onChange
                });
            });
            scope.clearDates = function () {
                if (scope.calendar) {
                    scope.calendar.clear();
                }
            };
        }
    };
}]);

angular.bootstrap(document, ['app']);

module.exports = app;

},{"./data.js":3,"./detailData.js":4,"./history.ctrl.js":5,"./import.ctrl.js":6,"./lib.js":8,"./query.ctrl.js":9,"./query2.ctrl.js":10,"angular-route":2}],8:[function(require,module,exports){
/*
* @Author: slr
* @Date:   2016-06-03 16:34:50
* @Last Modified by:   slr
* @Last Modified time: 2016-06-04 16:08:05
*/

'use strict';

var angular = window.angular;
var $ = window.jQuery;
var moment = window.moment;
moment.locale('zh-cn');
$.extend( true, $.fn.dataTable.defaults, {
    language: {
        "sProcessing": "处理中...",
        "sLengthMenu": "显示 _MENU_ 项结果",
        "sZeroRecords": "没有匹配结果",
        "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
        "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
        "sInfoFiltered": "(由 _MAX_ 项结果过滤)",
        "sInfoPostFix": "",
        "sSearch": "在结果中搜索:",
        "sUrl": "",
        "sEmptyTable": "没有找到符合条件的结果",
        "sLoadingRecords": "载入中...",
        "sInfoThousands": ",",
        "oPaginate": {
            "sFirst": "首页",
            "sPrevious": "上页",
            "sNext": "下页",
            "sLast": "末页"
        },
        "oAria": {
            "sSortAscending": ": 以升序排列此列",
            "sSortDescending": ": 以降序排列此列"
        }
    }
} );


module.exports = {
    angular: angular,
    $: $,
    moment: moment
};
},{}],9:[function(require,module,exports){
/**
* @Author: slr
* @Date:   2016-11-06T19:57:14+08:00
* @Last modified by:   slr
* @Last modified time: 2016-12-07T00:08:31+08:00
*/


var data = require('./data.js');
module.exports = ['$scope', '$http', function ($scope, $http) {
    for (var k in data) {
        $scope[k] = angular.copy(data[k]);
    }
    $scope.q = {};
    $scope.q.roomType = $scope.roomTypeList[0].id;
    $scope.q.dateType = 1;
    $scope.q.weekday = $scope.weekdayList[0].id;
    $scope.week = [1, 19];
    $scope.dates = [''];

    $scope.query = function () {
        $scope.q.period = $scope.timeList.filter(function (d) {
            return d.checked;
        }).map(function (d) {
            return d.id
        }).join(',');
        if (!$scope.q.period) {
            alert('请选择时段');
            return false;
        }
        $scope.q.building = $scope.buildingList.filter(function (d) {
            return d.checked;
        }).map(function (d) {
            return d.id;
        }).join(',');
        if (!$scope.q.building) {
            $scope.q.building = $scope.buildingList.map(function (d) {
                return d.id;
            }).join(',');
        }
        // $scope.q.week = [];
        // for (var i = $scope.week[0]; i <= $scope.week[1]; i++) {
        //     $scope.q.week.push(i);
        // }
        // $scope.q.week = $scope.q.week.join(',');
        if (!$scope.dates || !$scope.dates.length) {
            alert('请选择日期');
            return false;
        }
        $scope.q.date = $scope.dates.map(function (d) {
            return [d.getFullYear(), d.getMonth() + 1, + d.getDate()].map(function (t) {
                if (t < 10) t = '0' + t;
                return t;
            }).join('-');
        }).join(',');

        $scope.isQuerying = true;
        $http.get('../../classroom/search/result', {params: $scope.q}).success(function (res) {
            $scope.rooms = res.result;
        }).finally(function () {
            $scope.isQuerying = false;
        });
    };

    $scope.changeQuery = function () {
        $scope.rooms = undefined;
    }
    $scope.changeSem = function (sem) {
        $scope.$broadcast('change', sem);
    };
    
    $scope.changeDates = function (dates) {
        $scope.dates = dates;
    }
}];

},{"./data.js":3}],10:[function(require,module,exports){
/**
* @Author: slr
* @Date:   2016-11-06T19:57:41+08:00
* @Last modified by:   slr
* @Last modified time: 2016-12-06T15:18:35+08:00
*/


var data = require('./data.js');
var detail = require('./detailData.js');
module.exports = ['$scope', '$http', 'roomNameFilter', '$uibModal', function ($scope, $http, roomNameFilter, $uibModal) {
    for (var k in data) {
        $scope[k] = angular.copy(data[k]);
    }
    $scope.buildings = detail.buildings;
    $scope.rooms = detail.rooms;
    $scope.week = 15;
    $scope.q = {};
    $scope.weekdayList = data.weekdayList;
    $scope.roomName = roomNameFilter;


    $scope.getCurrentRooms = function () {
        // $scope.roomList = $scope.currentRooms = $scope.rooms[$scope.building];
        $scope.query();
    };

    $scope.query = function () {
        if ($scope.week && $scope.building) {
            $('.ft_container').remove();
            $scope.isQuerying = true;
            $scope.q.week = $scope.week;
            $scope.q.building = $scope.building;
            // $scope.q.room = $scope.room[0];
            console.log($scope.q);
            $http.get('../../classroom/search/classdata', {
                params: $scope.q
            }).success(function (res) {
                console.log(res);
                if (res.status === 0) {
                    $scope.roomData = res.result;
                    $scope.roomList = [];
                    $scope.roomData.forEach(function (r) {
                        $scope.roomList.push(r.room);
                    });
                    $scope.classData = res.cname;
                }
            }).finally(function () {
                $scope.isQuerying = false;
            });
        }
    };
    $scope.selects = [];
    var renderSelects = function () {
        $scope.selects.length = 0;
        $scope.roomData.forEach(function (r, i) {
            r.data.forEach(function (d, j) {
                if (d === 2) {
                    var room = $scope.roomList[i];
                    var time = j;
                    var weekday = $scope.weekdayList[Math.floor(time / 7)];
                    var period = $scope.timeList[time % 7];
                    $scope.selects.push({
                        room: room,
                        weekday: weekday,
                        period: period
                    });
                }
            });
        })
    };
    $scope.select = function (column, weekday, period) {
        var c = $scope.roomData[column].data[weekday * 7 + period];
        $scope.roomData[column].data[weekday * 7 + period] = 2 - c;
        renderSelects();
    };
    $scope.lend = function () {
        if (!$scope.selects.length) return false;
        var postdata = {
            building: $scope.building,
            week: $scope.week,
            time: $scope.selects.map(function (v) {
                return {
                    room: v.room[0],
                    weekday: v.weekday.id,
                    period: v.period.id
                }
            }),
            remarks: $scope.remarks
        };
        for (k in $scope.q) {
            if ($scope.q[k]) {
                postdata[k] = $scope.q[k];
            }
        }
        console.log(postdata);
        $scope.postdata = postdata;
        $uibModal.open({
            template: $('#t-lend-preview-2').html(),
            scope: $scope,
            controller: ['$uibModalInstance', '$scope', '$http', function ($instance, $scope, $http) {
                $scope.buildingName = $scope.buildings.find(function (v) {
                    return v.id === $scope.building.id;
                }).name;
                $scope.cancel = function () {
                    $instance.dismiss('cancel');
                };
                $scope.confirm = function () {
                    $http.post('../../classroom/lend/lendbyroom', $scope.postdata).success(function (res) {
                        console.log(res);
                        if (res.status === 0) {
                            $scope.fail = false;
                            $scope.lent = true;
                            $scope.remarks = '';
                            $scope.selects.length = 0;
                            $scope.query();
                        } else {
                            $scope.fail = true;
                        }
                    }).finally(function () {
                        $scope.hideProgress();
                    });
                };
            }]
        });
    };

}];

},{"./data.js":3,"./detailData.js":4}]},{},[7])
//# sourceMappingURL=index.js.map
