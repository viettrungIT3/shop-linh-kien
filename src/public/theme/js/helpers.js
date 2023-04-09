var Helpers = {

        urls: {

        },

        statuses:{
            waiting: "waiting", 
            done_waiting: "done-waiting", 
            complete: "complete", 
            error: "error",
            no_change: "no-change"
        }, 

        break_points: {
            tablet:  767, 
            h_tablet: 960, 
            small_screen: 1024,
            medium_screen: 1400, 
            hd: 1980
        },

        classes: {
            waiting: "css-waiting", 
            complete: "css-complete", 
            has_error: "has-error", 
            enrollment_compare_wrapper: { js: "js-compare-entry", css: "css-compare-entry" }, 
            the_message: {css: "css-the-messages", js: ""}, 
            the_message_content: {js: "js-the-message-content", css: "css-the-message-content"},
            floating_notification: {css: "css-floating-notification", js: "js-floating-notification" }

        }, 

        data_types: {
            error_message: "error-message", 
            success_message: "success-message", 
            info_message: "info-message",
            warning_message: "warning-message",
        },

        data_keys: {
            data_changed: "data-has-changed"
        }
};

export{ Helpers };

