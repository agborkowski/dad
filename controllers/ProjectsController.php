<?php

namespace dad\controllers;

use dad\models\Projects;

class ProjectsController extends \dad\extensions\action\BaseController {

	/**
	 * List projects
	 *
	 * - `GET /projects/1` will return the all the projects for the project.
	 *
	 */
	public function index() {
		$projects = Projects::all();
		return compact('projects');
	}

	/**
	 * Get a single project
	 *
	 * - `GET /projects/1` will return the specified project.
	 *
	 */
	public function show() {
		$project = Projects::find($this->request->id);

		if (!$project) {
			return $this->redirect('/projects');
		}

		return compact('project');
	}

	/**
	 * - GET `/projects/add`
	 */
	public function add() {
		$project = Projects::create();
		return compact('project');
	}

	/**
	 * Create a new project
	 *
	 * - `POST /projects` will create a new project from the parameters passed.
	 *
	 * Returns `201 Created` on success,
	 * with the `Location` header set to the URL of the newly-created project.
	 */
	public function create() {
		$project = Projects::create($this->project_data());

		if ($project->save()) {
			return $this->redirect('/projects/' . $project->_id, ['status' => 201]);
		} else {
			$this->_render['template'] = 'add';
		}

		return compact('project');
	}

	/**
	 * - `GET /projects/edit`
	 */
	public function edit() {
		$project = Projects::find($this->request->id);

		if (!$project) {
			return $this->redirect('/projects');
		}

		return compact('project');
	}

	/**
	 * Update a project
	 *
	 * - `PUT /projects/1` will update the project from the parameters passed.
	 *
	 * Return a `200 OK` on success.
	 * If the user does not have access to update the project, you'll see `403 Forbidden`.
	 */
	public function update() {
		$project = Projects::find($this->request->id);

		if ($project->save($this->project_data())) {
			return $this->redirect('/projects/' . $project->_id);
		} else {
			$this->_render['template'] = 'edit';
		}

		return compact('project');
	}

	/**
	 * Delete a project
	 *
	 * - `DELETE /projects/1` will delete the project specified.
	 *
	 * Return a `204 No Content` on success.
	 */
	public function delete() {
		$project = Projects::find($this->request->id);

		if ($project->delete()) {
			return $this->render(['head' => true, 'status' => 204]);
		}

		return $this->render(['head' => true, 'status' => 400]);
	}


	/**
	 * Encapsulate the permissible attributes of a project
	 */
	private function project_data() {
		return array_intersect_key($this->request->data, array_flip(['name', 'description']));
	}
}

?>