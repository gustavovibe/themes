<style>
h5{font-weight: bolder;}
.cyan{color: #91b2c0;}
.purple{color: #281a5f;}
.teal{color: #13a3c4;}
.orange{color: #e2a367;}
.corn{color: #477bad;}
.row {
  display: flex;
  flex-wrap: wrap;
  padding: 0px;
}
.cover {
    position: absolute;
    top: 5px;
    left: 5px;
		width: 97%;
    height: 50%;
    background: linear-gradient(180deg,currentColor 0,transparent);
    transition: .5s ease;
    opacity: 0.9;
    font-size: 20px;
    text-align: center;
}
.blue{color: #1b65d6;}
.travel-featured-overlay{
    padding: 15% 5% 5% 5%;
    text-align: center;
		color: white;
}

/* Create four equal columns that sits next to each other */
.column {
  flex: 25%;
  max-width: 25%;
  padding: 0px;
}

.tile {
  margin-top: 0px;
	padding: 5px;
	position: relative;
  vertical-align: middle;
  width: 100%;
}

/* Responsive layout - makes a two column-layout instead of four columns */
@media screen and (max-width: 800px) {
  .column {
    flex: 50%;
    max-width: 50%;
  }
	.cover{width: 95%;}
}

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 300px) {
  .column {
    flex: 100%;
    max-width: 100%;
  }
}
.travel-featured-tile {margin: 8px;}
.featured{max-width:90%!important;display: inline-flex;}
.overflow-scroll{
background: #fafbfc;
    padding: 30px 0;
}
.travel-activities-activity{
    display: inline-block;
    padding: 20px;
    text-align: center;
    width: 160px;
}
.travel-activities-activity-icon{
    width: 1.5em;
    margin: auto;
    padding-top: 12px;
}
.circle{
width: 70px;
    height: 70px;
    border-radius: 50%;
    background: white;
    display: inline-flex;
}
.entry-header{display:none!important;}
.entry-content{margin-top:0px!important;}
.site-main{padding-top:0px!important;}
.inline{display:inline-flex;}
.box{margin: 0 auto;
    max-width: 440px;
    padding: 2rem;
    background-color: #fff;
    box-shadow: 0 0.4rem 1.1rem rgb(50 58 67 / 12%);
    transition: box-shadow .25s,transform .25s;}
.box:hover {
  transform: scale(1.1); }
</style>