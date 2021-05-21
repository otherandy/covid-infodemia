$("#form").submit(function(e) {
    e.preventDefault()

    var query = $("#search").val()
    let result = ''
    var API_KEY = 'c937939c823eba91c8bc0b71d54bc6a5'

    var url = 'http://api.serpstack.com/search?access_key=' + API_KEY + '&type=web&query=' + query
    console.log(url)

    $.get(url, function(data) {
        console.log(data)
        $("#result").empty()
        data.organic_results.forEach(res => {
            result = `
            
            <h1>${res.title}</h1><br><a href="${res.url}">${res.url}</a>
            <p>${res.snippet}</p>

            `
            $("#result").append(result)
        });

    })
})
