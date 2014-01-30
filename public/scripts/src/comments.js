/** @jsx React.DOM */

//Temp Data

var data = [
	{author: "Pete Hunt", text: "This is one comment"},
	{author: "Jordan Walke", text: "This is *another* comment"}
];

//React Components

var CommentList = React.createClass({
	render:function(){

		//Create comments from commentBox's data
		var commentNodes = this.props.data.map(function(comment){
			return <Comment author={comment.author}>{comment.text}</Comment>;
		});

		//Return the comment list
		return(
			<div className="commentList">
				{commentNodes}
			</div>
		);
	}
});

var CommentForm = React.createClass({
	render:function(){
		return(
			<div className="commentForm">
				Hello, world! I am a CommentForm.
			</div>
		);
	}
});

var CommentBox = React.createClass({
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
			<div className="commentBox">
				<h1>Comments</h1>
				<CommentList data={this.state.data} /> 
				<CommentForm />
			</div>
		);
	} 
});

var Comment = React.createClass({
	render:function(){
		return(
			<div className="comment">
				<span className="bold">{this.props.author}</span>
				<p>{this.props.children}</p>
			</div>
		)
	}
});

React.renderComponent(
	//Send the comment's data object to the commentbox
	<CommentBox data={data} />,
	document.getElementById('comments')
)
