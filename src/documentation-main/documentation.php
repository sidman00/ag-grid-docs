<?php
$key = "index";
$pageTitle = "ag-Grid JavaScript Grid Documentation";
$pageDescription = "Introduction page of documentation for ag-Grid JavaScript Grid";
$pageKeyboards = "ag-Grid JavaScript Grid Documentation";
include 'documentation_header.php';
?>


<div class="row">

    <div class="col-md-9">

<!--
        <div class="row framework-select-list">
            <div class="col-md-4">
                <a href="../javascript-grid-getting-started/">
                    <div class="framework-select-item">
                        <img src="../images/svg/docs/getting_started.svg" width="50" alt="Getting Started" title="Getting Started"/>
                        <div class="framework-select-label">
                            Getting Started
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="../javascript-grid-reference-overview/">
                    <div class="framework-select-item">
                        <img src="../images/svg/docs/interfacing.svg" width="50" alt="Reference" title="Reference"/>
                        <div class="framework-select-label">
                            Reference
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="../javascript-grid-features/">
                    <div class="framework-select-item">
                        <img src="../images/svg/docs/features.svg" width="50" alt="Features" title="Features"/>
                        <div class="framework-select-label">
                            Features
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="row framework-select-list">
            <div class="col-md-4">
                <a href="../javascript-grid-row-models/">
                    <div class="framework-select-item">
                        <img src="../images/svg/docs/row_models.svg" width="50" alt="Row Models" title="Row Models"/>
                        <div class="framework-select-label">
                            Row Models
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="../javascript-grid-styling/">
                    <div class="framework-select-item">
                        <img src="../images/svg/docs/themes.svg" width="50" alt="Themes" title="Themes"/>
                        <div class="framework-select-label">
                            Themes
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="../javascript-grid-components/">
                    <div class="framework-select-item">
                        <img src="../images/svg/docs/components.svg" width="50" alt="Components" title="Components"/>
                        <div class="framework-select-label">
                            Components
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="row framework-select-list">
            <div class="col-md-4">
                <a href="../javascript-grid-examples/">
                    <div class="framework-select-item">
                        <img src="../images/svg/docs/examples.svg" width="50" alt="Examples" title="Examples"/>
                        <div class="framework-select-label">
                            Examples
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="../javascript-grid-third-party/">
                    <div class="framework-select-item">
                        <img src="../images/svg/docs/abc.svg" width="50" alt="Third Party" title="Third Party"/>
                        <div class="framework-select-label">
                            Third Party
                        </div>
                    </div>
                </a>
            </div>
        </div>
    -->

        <div class="list-group">
            <a href="/javascript-grid-getting-started/" class="list-group-item">
                <div class="float-parent">
                    <div class="section-icon-container">
                        <img src="../images/svg/docs/getting_started.svg" width="50" />
                    </div>
                    <h3 class="list-group-item-heading">Getting Started</h3>
                    <p class="list-group-item-text">
                        Learn how to get a simple
                        application working using ag-Grid with the framework that you have chosen.
                        Start here to get a simple grid working in your application, then follow on
                        to further sections to understand how particular features work.
                    </p>
                </div>
            </a>
            <a href="/javascript-grid-reference-overview/" class="list-group-item">
                <div class="float-parent">
                    <div class="section-icon-container">
                        <img src="../images/svg/docs/interfacing.svg" width="50" />
                    </div>
                    <h3 class="list-group-item-heading">Reference</h3>
                    <p class="list-group-item-text">
                        Lists all the configuration options (properties, events, api etc) for ag-Grid.
                        Use this as a quick reference to look all available options.
                    </p>
                </div>
            </a>

            <a href="/javascript-grid-features/" class="list-group-item">
                <div class="float-parent">
                    <div class="section-icon-container">
                        <img src="../images/svg/docs/features.svg" width="50" />
                    </div>
                    <h3 class="list-group-item-heading">Features</h3>
                    <p class="list-group-item-text">
                        A detailed look at all the features. Go here for detailed explanations and examples
                        for all features. Items that are only available
                        in ag-Grid Enterprise are marked with the "<img src="../images/enterprise.png"/>" symbol.
                    </p>
                </div>
            </a>

            <a href="/javascript-grid-row-models/" class="list-group-item">
                <div class="float-parent">
                    <div class="section-icon-container">
                        <img src="../images/svg/docs/row_models.svg" width="50" />
                    </div>
                    <h3 class="list-group-item-heading">Row Models</h3>
                    <p class="list-group-item-text">
                        The grid supports many ways to load the data eg <i>pagination</i> and <i>virtual
                            scrolling</i>. Learn how to apply these techniques to manage large amounts of
                        data.
                    </p>
                </div>
            </a>

            <a href="/javascript-grid-styling/" class="list-group-item">
                <div class="float-parent">
                    <div class="section-icon-container">
                        <img src="../images/svg/docs/themes.svg" width="50" />
                    </div>
                    <h3 class="list-group-item-heading">Themes</h3>
                    <p class="list-group-item-text">
                        The grid comes with many built in themes and also the ability to design
                        your own theme. Get the grid to fit the overall look and feel of your
                        application.
                    </p>
                </div>
            </a>

            <a href="/javascript-grid-components/" class="list-group-item">
                <div class="float-parent">
                    <div class="section-icon-container">
                        <img src="../images/svg/docs/components.svg" width="50" />
                    </div>
                    <h3 class="list-group-item-heading">Components</h3>
                    <p class="list-group-item-text">
                        Introduce your own behaviours into the grid by providing custom
                        components such as Cell Renderers, Cell Editors, Filters and
                        Header Components. These can be done using plain JavaScript
                        or a framework of your choice eg Angular or React.
                    </p>
                </div>
            </a>

            <a href="/javascript-grid-examples/" class="list-group-item">
                <div class="float-parent">
                    <div class="section-icon-container">
                        <img src="../images/svg/docs/examples.svg" width="50" />
                    </div>
                    <h3 class="list-group-item-heading">Examples</h3>
                    <p class="list-group-item-text">
                        End to end examples demonstrating many of the features of ag-Grid.
                    </p>
                </div>
            </a>

            <a href="/javascript-grid-third-party/" class="list-group-item">
                <div class="float-parent">
                    <div class="section-icon-container">
                        <img src="../images/svg/docs/abc.svg" width="50" />
                    </div>
                    <h3 class="list-group-item-heading">Third Party</h3>
                    <p class="list-group-item-text">
                        End to end examples demonstrating integration of ag-Grid with Third Party products.
                    </p>
                </div>
            </a>

        </div>

    </div>


    <div class="col-md-3">
        <?php include 'documentation_sidebar.php'; ?>
    </div>

</div>


<?php include 'documentation_footer.php'; ?>
