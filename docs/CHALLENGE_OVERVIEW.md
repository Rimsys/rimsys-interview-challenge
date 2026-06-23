# Rimsys Interview Challenge Overview

## Purpose

This challenge is designed to evaluate how candidates:

* Read and interpret test-driven requirements
* Implement missing pieces without changing provided test cases
* Debug subtle issues
* Extend a working system with new functionality
* Use modern Laravel and PHP 8.3+ features confidently
* Use AI tools thoughtfully without outsourcing engineering judgment

## Challenge Description

You are working on a **Regulatory Document Tracker** application for Rimsys. The app manages:

* **Products** — medical devices
* **Documents** — attached compliance and regulatory files
* **Document Types** — REGULATORY, TECHNICAL, QUALITY, and CLINICAL

The application is half-implemented, with intentional gaps and issues that you need to fix in a live 60-minute backend interview.

## Your Task

Your task is to make the application work by:

1. Reading the visible tests and project code to understand the expected behavior
2. Implementing the missing backend pieces
3. Fixing bugs without weakening the requirements
4. Adding your own tests when they help you verify behavior

You should not modify or delete the provided tests. Visible tests are examples, not exhaustive acceptance criteria.

AI tools are allowed. We expect you to explain how you used them, what you verified, which suggestions you rejected or changed, and what tradeoffs remain.

## Expected Backend Behavior

The finished backend should support:

* Retrieving a product by id
* Listing active documents attached to a product
* Filtering a product's active documents by document type
* Downloading a product's active documents as a zip file

Use idiomatic Laravel data modeling, Eloquent relationships, migrations, factories, query constraints, storage handling, and HTTP responses.

Supported document types are `REGULATORY`, `TECHNICAL`, `QUALITY`, and `CLINICAL`.

## Evaluation Criteria

You will be evaluated on:

* Code quality and organization
* Understanding of Laravel and PHP features
* Problem-solving approach
* Attention to detail
* Ability to follow requirements
* Use of modern Laravel and PHP features
* How well you supervise, verify, and explain AI-assisted work
* Prioritization under the 60-minute time constraint

Partial completion can still be a strong result when paired with clear reasoning, working core behavior, and a realistic explanation of what remains.
