window.doc_page = {
    addon: 'Low Nice Date',
    title: 'Tags',
    sections: [
        {
            title: '',
            type: 'tagtoc',
            desc: 'Low Nice Date has the following front-end tags: ',
        },
        {
            title: '',
            type: 'tags',
            desc: ''
        },
    ],
    tags: [
        {
            tag: '{exp:low_nice_date}',
            shortname: 'exp:low_nice_date',
            summary: "The main single tag",
            desc: "",
            sections: [
                {
                    type: 'params',
                    title: 'Tag Parameters',
                    desc: '',
                    items: [
                        {
                            item: 'date',
                            desc: 'Any date string. Required.',
                            type: '',
                            accepts: '',
                            default: '',
                            required: true,
                            added: '',
                            examples: [
                                {
                                    tag_example: `{exp:low_nice_date date="2007-05-20" format="%F %j%S, %Y" localize="yes"}`,
                                    outputs: ``
                                 }
                             ]
                        },
                        {
                            item: 'format',
                            desc: 'Formatting code, just like the Date Variable Formatting. Required',
                            type: '',
                            accepts: '',
                            default: '',
                            required: true,
                            added: '',
                            examples: [
                                {
                                    tag_example: `{exp:low_nice_date date="{segment_3}-{segment_4}-01" format="%F %Y"}`,
                                    outputs: ``
                                 }
                             ]
                        },
                        {
                            item: 'localize',
                            desc: '	Localizes date to current member, defaults to no.',
                            type: '',
                            accepts: '',
                            default: 'no',
                            required: false,
                            added: '',
                            examples: [
                                {
                                    tag_example: ``,
                                    outputs: ``
                                 }
                             ]
                        },
                        
                      
                    ]
                }
            ]
        },
        {
            tag: '{exp:low_nice_date:range}',
            shortname: 'exp:low_nice_date:range',
            summary: "",
            desc: "For date ranges this is a pair tag",
            sections: [
                {
                    type: 'params',
                    title: 'Tag Parameters',
                    desc: '',
                    items: [
                        {
                            item: 'from',
                            desc: 'Any date string or Unix timestamp. Defaults to now.',
                            type: 'date',
                            accepts: '',
                            default: 'now',
                            required: false,
                            added: '',
                            examples: [
                                {
                                    tag_example: `
{exp:low_nice_date:range from="{date_one}" to="{date_two}"}
    {if days == 0}
        The two dates are on the same day
    {if:else}
        The two dates span {days} days
    {/if}
{/exp:low_nice_date:range}`,
                                    outputs: ``
                                 }
                             ]
                        },
                        {
                            item: 'to',
                            desc: '	Any date string or Unix timestamp. Defaults to now.',
                            type: 'date',
                            accepts: '',
                            default: 'now',
                            required: false,
                            added: '',
                            examples: [
                                {
                                    tag_example: ``,
                                    outputs: ``
                                 }
                             ]
                        },
                        
                      
                    ]
                },

                {
                    type: 'vars',
                    title: 'Variables',
                    desc: '',
                    items: [
                        {
                            item: 'days',
                            desc: '	Number of days (multiples of 24 hours) between the two dates.',
                            type: '',
                            accepts: '',
                            default: '',
                            required: false,
                            added: '',
                            examples: [
                                {
                                    tag_example: `{days}`,
                                    outputs: ``
                                 }
                             ]
                        },
                        {
                            item: 'months',
                            desc: '	Number of months between the two dates.',
                            type: '',
                            accepts: '',
                            default: '',
                            required: false,
                            added: '',
                            examples: [
                                {
                                    tag_example: `{months}`,
                                    outputs: ``
                                 }
                             ]
                        },
                        {
                            item: 'years',
                            desc: 'Number of years between the two dates.',
                            type: '',
                            accepts: '',
                            default: '',
                            required: false,
                            added: '',
                            examples: [
                                {
                                    tag_example: `{years}`,
                                    outputs: ``
                                 }
                             ]
                        },
                        
                      
                    ]
                }
            ]
        },



    ]
};