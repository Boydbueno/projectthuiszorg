/** @jsx React.DOM */

//Data

var jobId = $("#comments").attr("rel");

//React Components

var CommentList = React.createClass({displayName: 'CommentList',
	render:function(){

		//Create comments from commentBox's data
		var commentNodes = this.props.data.map(function(comment){
			return Comment( {author:comment.user.user_info.firstName+' '+comment.user.user_info.lastName}, comment.text);
		});

		//Return the comment list
		return(
			React.DOM.div( {className:"commentList"}, 
				commentNodes
			)
		);
	}
});

var CommentForm = React.createClass({displayName: 'CommentForm',
	render:function(){
		return(
			React.DOM.form( {className:"commentForm"}, 
				React.DOM.input( {type:"text", placeholder:"Your name"} ),
				React.DOM.input( {type:"text", placeholder:"Say something..."} ),
				React.DOM.input( {type:"submit", value:"Post"} )
			)
		);
	}
});

var CommentBox = React.createClass({displayName: 'CommentBox',
	loadCommentsWithAjax: function(){
		$.ajax({
			url: '/api/jobs/'+jobId+'/comments',
			dataType: 'json',
			success: function(data) {
				//Replace the old array of data with new data
				//This forces the component to re-render itself
				this.setState({data: data});
			}.bind(this),
			error: function(xhr, status, err) {
				console.error("comments.json", status, err.toString());
			}.bind(this)
		});
	},
	getInitialState: function(){
		return {data: []};
	},
	//Executed before the component is rendered
	componentWillMount: function(){
		//Load all the comments from the server
		this.loadCommentsWithAjax();
		//Set an interval to check for new comments
		setInterval(this.loadCommentsWithAjax, this.props.pollInterval);
	},
	//Render the commentBox and pass the data to the commentList
	render:function(){
		return(
			React.DOM.div( {className:"commentBox"}, 
				React.DOM.h1(null, "Comments"),
				CommentList( {data:this.state.data} ), 
				CommentForm(null )
			)
		);
	} 
});

var Comment = React.createClass({displayName: 'Comment',
	render:function(){
		return(
			React.DOM.div( {className:"comment"}, 
				React.DOM.span( {className:"bold"}, this.props.author),
				React.DOM.p(null, this.props.children)
			)
		)
	}
});

React.renderComponent(
	CommentBox( {pollInterval:2000} ),
	document.getElementById('comments')
)
