/** @jsx React.DOM */

//Temp Data

var data = [
	{author: "Pete Hunt", text: "This is one comment"},
	{author: "Jordan Walke", text: "This is *another* comment"}
];

//React Components

var CommentList = React.createClass({displayName: 'CommentList',
	render:function(){

		//Create comments from commentBox's data
		var commentNodes = this.props.data.map(function(comment){
			return Comment( {author:comment.author}, comment.text);
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
			React.DOM.div( {className:"commentForm"}, 
				" Hello, world! I am a CommentForm. "
			)
		);
	}
});

var CommentBox = React.createClass({displayName: 'CommentBox',
	getInitialState: function(){
		return {data: []};
	},
	//Executed before the component is rendered
	componentWillMount: function(){
		$.ajax({
			url: 'comments.json',
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
	//Send the comment's data object to the commentbox
	CommentBox( {data:data} ),
	document.getElementById('comments')
)
