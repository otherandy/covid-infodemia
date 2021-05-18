$("#form").submit(function(e) {
    e.preventDefault()

    var query = $("search").val()
    var API_KEY = '120a54ec01a9d6c54fd496ccc00f2b06'

    var url = 'http://api.serpstack.com/search?access_key=' + API_KEY + '&type=web&query=' + query
    console.log(url)

    $.get(url, function(data) {
        console.log(data)
    })
})