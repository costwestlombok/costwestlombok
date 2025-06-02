<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Publication Policy - CoST West Lombok</title>
	<link rel="shortcut icon" href="/metronic/assets/media/logos/favicon.ico" />
	<style>
		:root {
			--primary-color: #2c3e50;
			--secondary-color: #34495e;
			--accent-color: #3498db;
			--text-color: #333;
			--light-gray: #f5f6fa;
			--border-color: #dcdde1;
		}

		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		body {
			font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
			line-height: 1.6;
			color: var(--text-color);
			background-color: #fff;
		}

		.container {
			max-width: 1200px;
			margin: 0 auto;
			padding: 2rem;
		}

		header {
			background-color: var(--primary-color);
			color: white;
			padding: 2rem 0;
			margin-bottom: 2rem;
		}

		.header-content {
			max-width: 1200px;
			margin: 0 auto;
			padding: 0 2rem;
		}

		h1 {
			font-size: 2.5rem;
			margin-bottom: 1rem;
		}

		h2 {
			font-size: 2rem;
			color: var(--primary-color);
			margin: 2rem 0 1rem;
			padding-bottom: 0.5rem;
			border-bottom: 2px solid var(--border-color);
		}

		h3 {
			font-size: 1.5rem;
			color: var(--secondary-color);
			margin: 1.5rem 0 1rem;
		}

		p {
			margin-bottom: 1rem;
		}

		ul,
		ol {
			margin: 1rem 0;
			padding-left: 2rem;
		}

		li {
			margin-bottom: 0.5rem;
		}

		table {
			width: 100%;
			border-collapse: collapse;
			margin: 1rem 0;
		}

		th,
		td {
			padding: 0.75rem;
			border: 1px solid var(--border-color);
			text-align: left;
		}

		th {
			background-color: var(--light-gray);
			font-weight: 600;
		}

		tr:nth-child(even) {
			background-color: var(--light-gray);
		}

		.note {
			background-color: #e8f4f8;
			border-left: 4px solid var(--accent-color);
			padding: 1rem;
			margin: 1rem 0;
		}

		.footer {
			margin-top: 3rem;
			padding-top: 1rem;
			border-top: 1px solid var(--border-color);
			font-size: 0.9rem;
			color: #666;
		}

		a {
			color: var(--accent-color);
			text-decoration: none;
		}

		a:hover {
			text-decoration: underline;
		}

		.code-block {
			background-color: var(--light-gray);
			padding: 1rem;
			border-radius: 4px;
			font-family: monospace;
			overflow-x: auto;
		}
	</style>
</head>

<body>
	<header>
		<div class="header-content">
			<h1>Publication Policy: Data User Guide</h1>
			<p>CoST West Lombok</p>
		</div>
	</header>

	<div class="container">
		<section id="purpose">
			<h2>Purpose of Publication</h2>
			<p>The publication of procurement data at <a href="https://intras.lombokbaratkab.go.id/oc4ids">https://intras.lombokbaratkab.go.id/oc4ids</a> aims to ensure that all information on public procurement of the West Lombok District Transportation Office is accessible online and in open formats, so that it can be used, reused and redistributed by any interested party.</p>
		</section>

		<section id="uses">
			<h2>Uses of the Data</h2>
			<p>CoST West Lombok is working together with stakeholders to use open contracting data to promote transparency and accountability in public procurement.</p>
			<p>Using structured, standardized, open data on public contracting can help stakeholders to:</p>
			<ul>
				<li>Deliver better value for money for governments</li>
				<li>Create fairer competition and a level playing field for business</li>
				<li>Drive higher-quality goods, works, and services for citizens</li>
				<li>Prevent fraud and corruption</li>
				<li>Promote smarter analysis and better solutions for public problems</li>
			</ul>
		</section>

		<section id="publication-details">
			<h2>Publication Details</h2>

			<h3>Creation of OCDS Datasets</h3>
			<p>Our data is refreshed through a process which pulls it from our main database, converts it to OCDS version 0.9 and indexes it for search and download. The information available from our API is subject to these updates.</p>

			<h3>OCID Generation</h3>
			<p>Our publication uses the prefix "oc4ids-jj5f2u-" followed by the project ID as the contracting process identifier. This ensures unique identification across all projects.</p>

			<h3>Accessing the Data</h3>

			<h4>OCDS Data Formats</h4>
			<p>CoST West Lombok makes OCDS data available in various formats to meet the needs of different users. The following formats are available:</p>
			<table>
				<thead>
					<tr>
						<th>Format</th>
						<th>Description</th>
						<th>Link(s)</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Bulk OCDS release download (JSON)</td>
						<td>Annual files segmented by release date.<br><br>
							Suitable for analysis and/or storage in a document database.</td>
						<td><a href="https://intras.lombokbaratkab.go.id/oc4ids">https://intras.lombokbaratkab.go.id/oc4ids</a></td>
					</tr>
					<tr>
						<td>Bulk OCDS record download (JSON)</td>
						<td>Annual files segmented by initial release date.<br><br>
							Suitable for analysis and/or storage in a document database.</td>
						<td><a href="https://intras.lombokbaratkab.go.id/oc4ids">https://intras.lombokbaratkab.go.id/oc4ids</a></td>
					</tr>
					<tr>
						<td>Bulk OCDS release download (CSV)</td>
						<td>Annual ZIP archive containing a multi-table CSV serialization of OCDS data, segmented by release date.<br><br>
							Suitable for analysis in spreadsheet software and/or storage in a relational database.</td>
						<td><a href="https://intras.lombokbaratkab.go.id/oc4ids/export/csv">https://intras.lombokbaratkab.go.id/oc4ids/export/csv</a></td>
					</tr>
					<tr>
						<td>Bulk OCDS record download (CSV)</td>
						<td>Annual ZIP archive containing a multi-table CSV serialization of OCDS data, segmented by initial release date.<br><br>
							Suitable for analysis in spreadsheet software and/or storage in a relational database.</td>
						<td><a href="https://intras.lombokbaratkab.go.id/oc4ids/export/csv">https://intras.lombokbaratkab.go.id/oc4ids/export/csv</a></td>
					</tr>
					<tr>
						<td>Release API (JSON)</td>
						<td>Programmatic API with query parameters for project_id.<br><br>
							Suitable for access by digital tools to obtain recently updated data or to download a subset of data.</td>
						<td><a href="https://intras.lombokbaratkab.go.id/oc4ids/project/{project_id}">https://intras.lombokbaratkab.go.id/oc4ids/project/{project_id}</a></td>
					</tr>
					<tr>
						<td>Record API (JSON)</td>
						<td>Programmatic API for project details.<br><br>
							Suitable for access by tools, to obtain recently updated data or to download a subset of data.</td>
						<td><a href="https://intras.lombokbaratkab.go.id/oc4ids/project/{project_id}">https://intras.lombokbaratkab.go.id/oc4ids/project/{project_id}</a></td>
					</tr>
				</tbody>
			</table>

			<h4>Open Contracting Portal</h4>
			<p>CoST West Lombok provides an open contracting portal at:</p>
			<p><a href="https://intras.lombokbaratkab.go.id">https://intras.lombokbaratkab.go.id</a></p>
			<p>The portal provides search functionality and access to project details including:</p>
			<ul>
				<li>Project information</li>
				<li>Budget details</li>
				<li>Contracting processes</li>
				<li>Project parties</li>
				<li>Documents</li>
			</ul>

			<h4>Publisher's Website</h4>
			<p>The official website is available at:</p>
			<p><a href="https://intras.lombokbaratkab.go.id">https://intras.lombokbaratkab.go.id</a></p>
		</section>

		<section id="data-scope">
			<h2>Data Scope</h2>
			<p>The data includes:</p>
			<ul>
				<li>Project details (title, description, scope)</li>
				<li>Budget information</li>
				<li>Contracting processes</li>
				<li>Project parties</li>
				<li>Location data</li>
				<li>Environmental impact assessments</li>
				<li>Settlement descriptions</li>
			</ul>

			<h3>Exclusions and Omissions</h3>
			<p>Data may be excluded from publication where disclosure would:</p>
			<ul>
				<li>Compromise national security</li>
				<li>Violate privacy laws</li>
				<li>Breach confidentiality agreements</li>
				<li>Expose sensitive commercial information</li>
			</ul>
		</section>

		<section id="legal-concepts">
			<h2>Legal Concepts and OCDS Data</h2>
			<p>The procurement processes and terminology used in West Lombok District are documented in the system. The data structure follows the OCDS standard while maintaining compliance with local regulations.</p>
		</section>

		<section id="codes-extensions">
			<h2>Codes, Codelists, and Extensions</h2>
			<p>The data includes the following additional fields:</p>
			<ul>
				<li>Environment impact description</li>
				<li>Settlement description</li>
				<li>Project scope</li>
				<li>Location coordinates</li>
			</ul>

			<h3>List of Extensions</h3>
			<table>
				<thead>
					<tr>
						<th>Name</th>
						<th>Description</th>
						<th>Documentation</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Location</td>
						<td>Project location coordinates</td>
						<td><a href="https://standard.open-contracting.org/1.1/en/extensions/location/">https://standard.open-contracting.org/1.1/en/extensions/location/</a></td>
					</tr>
					<tr>
						<td>Project Scope</td>
						<td>Detailed project scope information</td>
						<td><a href="https://standard.open-contracting.org/1.1/en/extensions/project/">https://standard.open-contracting.org/1.1/en/extensions/project/</a></td>
					</tr>
				</tbody>
			</table>
		</section>

		<section id="responsibility">
			<h2>Responsibility, Contact and Feedback</h2>
			<p>CoST West Lombok is responsible for this OCDS publication. Please send any feedback to the system administrators through the contact form on the website.</p>
			<p>We welcome feedback on our open data and encourage data users and members of the public to get in touch with ideas of how to improve our open data sets.</p>
		</section>

		<section id="license">
			<h2>License</h2>
			<p>The data is published under the Open Data License, allowing users to:</p>
			<ul>
				<li>Use this data for any purpose including commercial and non-commercial use</li>
				<li>Publish content based on the use of this data</li>
				<li>Re-publish this data providing a link to the original source remains intact</li>
			</ul>
		</section>

		<section id="documentation">
			<h2>Additional Documentation</h2>
			<ul>
				<li><a href="https://intras.lombokbaratkab.go.id/docs">API Documentation</a></li>
				<li><a href="https://standard.open-contracting.org/1.1/en/">OCDS Standard Documentation</a></li>
			</ul>
		</section>

		<section id="future-plans">
			<h2>Future Development Plans</h2>
			<p>The following updates are planned:</p>
			<ul>
				<li>Enhanced search functionality</li>
				<li>Additional data visualization tools</li>
				<li>Improved API performance</li>
				<li>Extended data coverage</li>
			</ul>
		</section>

		<section id="disclaimer">
			<h2>Disclaimer</h2>
			<div class="note">
				<p>Access to the open data portal at <a href="https://intras.lombokbaratkab.go.id/oc4ids">https://intras.lombokbaratkab.go.id/oc4ids</a> does not imply that CoST West Lombok has verified the veracity, accuracy, adequacy, suitability, completeness and timeliness of the information provided. The data is provided as-is, and CoST West Lombok is not responsible for any decisions taken based on this information.</p>
			</div>
		</section>

		<footer class="footer">
			<p>This publication policy is based on the Open Contracting Data Standard (OCDS) Publication Policy Template.</p>
		</footer>
	</div>
</body>

</html>