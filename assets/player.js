
function playerAPI12() {
    that = this;
    this.sco = 'default';
    this.version = '1.2';
    this.increment = '';
    this.error = '0';
    this.initialized = false;
    this.keepValues = {};

    this.errorCodes = {
        0: 'No error.',
        101: 'General Exception.',
        201: 'Invalid argument error.',
        202: 'Element cannot have children.',
        203: 'Element not an array. Cannot have count.',
        301: 'Not initialized.',
        401: 'Not implemented error',
        402: 'Invalid set value, element is a keyword',
        403: 'Element is read only.',
        404: 'Element is write only.',
        405: 'Incorrect Data Type.'
    };

    this.defaultModel = {
        'cmi.core._children': ['student_id', 'student_name', 'lesson_location', 'credit', 'lesson_status', 'entry', 'score', 'total_time', 'lesson_mode', 'exit', 'session_time'],
        'cmi.core.student_id': '770b7a652cee065cbb9759ff1a0d46a927c8ba98',
        'cmi.core.student_name': 'Appleseed, John',
        'cmi.core.lesson_location': '',
        'cmi.core.credit': 'credit',
        'cmi.core.lesson_status': 'not attempted',
        'cmi.core.entry': 'ab-initio',
        'cmi.core.score_children': ['raw', 'min', 'max'],
        // TODO: limit score.raw to 100 and check its initial value
        'cmi.core.score.raw': null,
        'cmi.core.score.max': null,
        'cmi.core.score.min': null,
        // TODO: compute total_time, when setting session_time
        'cmi.core.total_time': '0000:00:00.00',
        'cmi.core.lesson_mode': 'normal',
        'cmi.core.exit': '',
        'cmi.core.session_time': '00:00:00',
        // TODO: limit suspend_data to 4096 chars
        'cmi.suspend_data': '',
        'cmi.launch_data': '',
        // TODO: limit comments to 4096 chars
        'cmi.comments': '',
        'cmi.comments_from_lms': '',
        'cmi.objectives._children': ['id', 'score', 'status'],
        'cmi.objectives._count': 0,
        'cmi.student_data._children': ['mastery_score', 'max_time_allowed', 'time_limit_action'],
        // TODO: check student_data initial values
        'cmi.student_data.mastery_score': null,
        'cmi.student_data.max_time_allowed': null,
        'cmi.student_data.time_limit_action': 'continue,no message',
        'cmi.student_preference._children': ['audio', 'language', 'speed', 'text'],
        'cmi.student_preference.audio': null,
        'cmi.student_preference.language': null,
        'cmi.student_preference.speed': null,
        'cmi.student_preference.text': null,
        'cmi.interactions._children': ['id', 'objectives', 'time', 'type', 'correct_responses', 'weighting', 'student_response', 'result', 'latency'],
        'cmi.interactions._count': 0
                // TODO: correct count, after adding interactions
    };

    this.defaultOpts = {
        persistFor: 60,
        model: null
    };

    this.LMSInitialize = function () {

        
        if (that.initialized)
            return that.lastError = 101, 'false';

        that.lastError = 0;
        that.initialized = true;

        return 'true';
    };

    this.LMSFinish = function () {
        console.log('LMSFinish');
        if (!that.initialized)
            return that.lastError = 301, 'false';

        that.lastError = 0;
        that.initialized = false;

        //top.location.reload();
        
        return 'true';
    };
    this.LMSGetValue = function (varName) {
        console.log('LMSGetValue => ' + varName);
        if (!that.initialized) {
            return that.lastError = 301, 'false';
        }

        var v = that.data[varName] || that.model[varName];
        if (typeof v == 'undefined') {
            return that.lastError = 201, null;
        }

        that.lastError = 0;
        
        console.log(varName+ ' => ' + v);
        
        return v;
    };
    this.LMSSetValue = function (varName, varValue) {
        console.log('LMSGetValue => ' + varName + ' = ' + varValue);
        if (!that.initialized)
            return that.lastError = 301, 'false';
        if (typeof that.model[varName] == 'undefined')
            return that.lastError = 201, 'false';

        that.data[varName] = varValue;
        that.lastError = 0;
        return 'true';
    };
    this.LMSCommit = function () {
        console.log('LMSCommit');
        //console.log(that);
        if (!that.initialized)
            return that.lastError = 301, 'false';

        that.store(that.data);
        that.lastError = 0;
        return 'true';
    };
    this.LMSGetLastError = function () {
        console.log('LMSGetLastError =>' + that.lastError);
        return that.lastError;
    };
    this.LMSGetErrorString = function (code) {
        console.log('LMSGetErrorString =>' + that.errorCodes[code]);
        return that.errorCodes[code];
    };
    this.LMSGetDiagnostic = function (code) {
        console.log('LMSGetDiagnostic');
        return that.errorCodes[code];
    };


    this.incl = function (a, b) {
        var c = {};
        a = a || {};
        b = b || {};

        Object.keys(b).forEach(function (k) {
            c[k] = typeof a[k] == 'undefined' ? b[k] : a[k];
        });
        return c;
    };

    this.time = function (s) {
        return (new Date()).getTime() + ((s || 0) * 1000);
    };

    this.store = function (value) {
        var k = 'scorm-local-' + (that.sco || 'default'),
                r = null;

        if (typeof value == 'undefined') {
            try {
                r = JSON.parse(localStorage.getItem(k));
            } finally {
            }

            if (!r || {}.toString.call(r) != '[object Object]' || r._flush ||
                    r._expireTime === 0)
                return {};

            if (r._expireTime !== -1 &&
                    that.time() >= (r._expireTime || Number.POSITIVE_INIFINITY))
                return {};

            return r;
        } else if (value === false) {
            return localStorage.removeItem(k);
        }
        
        console.log(value);

        //  0 always expire
        // -1 never expire
        // or time to expire
        value._expireTime = (function () {
            switch (true) {
                case (that.opts.persistFor > 0):
                    return that.time(that.opts.persistFor) + 1;
                case (that.opts.persistFor < 0):
                    return -1;
                default:
                    return 0;
            }
        })();

        localStorage.setItem(k, JSON.stringify(value));
        return value;
    }
    
    
    
    this.opts = this.defaultOpts;
    this.initialized = false;
    this.lastError = 0;
    this.model = this.defaultModel;
    this.data = this.store();
}




var API_1484_11 = new playerAPI2004();
function playerAPI2004() {
    this.version = '2004';
    this.increment = '';
    this.error = '0';
    this.initialized = false;
    this.keepValues = {};

    this.Initialize = function () {
        console.log('Initialize');
        return 'true';
    };

    this.Terminate = function () {
        console.log('Terminate');
        return 'true';
    };
    this.GetValue = function (varName) {
        console.log('GetValue => ' + varName);
        return 'true';
    };
    this.SetValue = function (varName, varValue) {
        console.log('SetValue => ' + varName + ' = ' + varValue);
        return 'true';
    };
    this.Commit = function () {
        console.log('Commit');
        return 'true';
    };
    this.GetLastError = function () {
        console.log('GetLastError');
        return 'true';
    };
    this.GetErrorString = function () {
        console.log('GetErrorString');
        return 'true';
    };
    this.GetDiagnostic = function () {
        console.log('GetDiagnostic');
        return 'true';
    };
}
